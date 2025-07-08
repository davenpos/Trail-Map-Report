import $ from "jquery"
import slugify from "slugify"
import "image-map-resizer"

export default class Tooltip {
  constructor() {
    this.tooltip = null
    this.areas = $("#imageContainer map area")
    this.trailInfo = siteData.trailData
    this.events()
  }

  events() {
    this.areas.each((_, area) => {
      $(area).on("mouseenter", e => this.tooltipAppear(e, area))
      $(area).on("mousemove", e => this.tooltipMove(e))
      $(area).on("mouseleave", () => this.tooltipDisappear())
      $(area).on("click", e => this.tooltipClick(e, area))
    })

    $(document).on("click touchstart", e => {
      if (this.tooltip && !$(e.target).is("area") && !$(e.target).closest("#tooltip").length) {
        this.tooltipDisappear()
      }
    })

    this.addTooltipHTML()
    $("map").imageMapResize()
  }

  tooltipAppear(e, area) {
    const alt = $(area).attr("alt")
    const slug = slugify(alt, { lower: true, remove: /'/g })
    const status = this.trailInfo === "" ? "Not Set" : this.trailInfo[slug][0]
    this.tooltip.html(`
      ${alt}<br />
      <b>Status:</b> ${status}
    `)
    this.tooltip.addClass("visible")
    this.tooltipMove(e)
  }

  tooltipMove(e) {
    this.tooltip.css({
      left: e.pageX + 10,
      top: e.pageY + 10
    })
  }

  tooltipDisappear() {
    this.tooltip.removeClass("visible")
  }

  tooltipClick(e, area) {
    e.preventDefault()
    e.stopPropagation()
    this.tooltipAppear(e, area)
  }

  addTooltipHTML() {
    $(document.body).append('<div id="tooltip"></div>')
    this.tooltip = $("#tooltip")
  }
}
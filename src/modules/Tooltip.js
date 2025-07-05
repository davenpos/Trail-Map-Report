import $ from 'jquery'

export default class Tooltip {
  constructor() {
    this.tooltip = null
    this.areas = $("#imageContainer map area")
    this.events()
  }

  events() {
    this.areas.each((_, area) => {
      $(area).on("mouseenter", e => this.tooltipAppear(e, area))
      $(area).on("mousemove", e => this.tooltipMove(e))
      $(area).on("mouseleave", () => this.tooltipDisappear())
    })
    this.addTooltipHTML()
  }

  tooltipAppear(e, area) {
    this.tooltip.text($(area).attr('alt'))
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

  addTooltipHTML() {
    $(document.body).append('<div id="tooltip"></div>')
    this.tooltip = $('#tooltip')
  }
}
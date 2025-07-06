import "../css/style.scss"
import $ from 'jquery'
import Tooltip from "./modules/Tooltip"
import 'image-map-resizer'

if ($("#imageContainer")) {
  $('map').imageMapResize()
  new Tooltip()
}
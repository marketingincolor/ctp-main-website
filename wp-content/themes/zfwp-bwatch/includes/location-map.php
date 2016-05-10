<?php
/**
 * Created by PhpStorm.
 * User: Edd
 * Date: 8/18/2015
 * Time: 10:07 AM
 */
?>

<script type="text/javascript">
	window.onload = function () {
		var ImageMap = function (map, img) {
				var n,
					areas = map.getElementsByTagName('area'),
					len = areas.length,
					coords = [],
					previousWidth = 592;
				for (n = 0; n < len; n++) {
					coords[n] = areas[n].coords.split(',');
				}
				this.resize = function () {
					var n, m, clen,
						x = img.offsetWidth / previousWidth;
					for (n = 0; n < len; n++) {
						clen = coords[n].length;
						for (m = 0; m < clen; m++) {
							coords[n][m] *= x;
						}
						areas[n].coords = coords[n].join(',');
					}
					previousWidth = img.offsetWidth;
					return true;
				};
				window.onresize = this.resize;
			},
			imageMap = new ImageMap(document.getElementById('map_ID'), document.getElementById('img_ID'));
		imageMap.resize();
		return;
	}
</script>

<img id="img_ID" src="<?php echo get_template_directory_uri(); ?>/img/tbw-gfrx-loc-map.png" alt="" usemap="#m_tbwgfrxlocmap" width="100%" name="tbwgfrxlocmap" border="0" />

<map id="map_ID" name="m_tbwgfrxlocmap">
	<area alt="" coords="290,319,299,331,325,304,322,277,311,277,311,270,288,270,289,290,303,302,290,319" shape="poly" href="../downtown" />
	<area alt="" coords="315,268,310,217,350,224,363,219,374,235,382,241,388,232,405,231,407,274,379,278,372,286,356,281,335,286,328,268,315,268" shape="poly" href="../ybor" />
	<area alt="" coords="279,329,237,371,233,299,277,295,279,329" shape="poly" href="../soho" />
	<area alt="" coords="231,294,221,310,199,309,156,327,145,289,126,254,106,258,78,259,68,228,18,204,23,185,43,181,105,189,145,188,195,179,231,179,225,193,224,210,215,241,231,294" shape="poly" href="../westshore" />
</map>
<br /><br />
<p>
	<strong>Downtown Street Boundaries</strong><br/>
	Your business is located in the Downtown Tampa district if it is located (from east to north) between Ybor Channel to the east, Garrison Channel to the southeast, Hillsborough River to the southwest, Selmon Expressway East to the south, N. Boulevard to the far west, Cass Street to the northwest, Hillsborough River to the west, Scott Street to the far north, Orange Avenue north central, Harrison Street to the north, and Nuccio Parkway / Adamo Drive to the northeast.
</p>
<p>
	<strong>SoHo Street Boundaries</strong><br/>
	Your business is located in the SoHo district if it is located between MacDill Avenue to the west, Bayshore Blvd. to the south, Boulevard to the east, and Kennedy Blvd. to the north.
</p>
<p>
	<strong>Westshore Street Boundaries</strong><br/>
	Your business is located in the Westshore district if it is located between Obrien Street to the west, Kennedy Avenue to the south, Lois Avenue to the east, and Boy Scout Blvd. to the north.
</p>
<p>
	<strong>Ybor City Street Boundaries</strong><br/>
	Your business is located in the Ybor City district if it is located between Nuccio Parkway to the west, Adamo Drive to the south, 26th Street to the east, and Interstate 4 to the north.
</p>

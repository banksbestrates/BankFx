<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
.with_frm_style .chosen-container{
    font-size:<?php echo esc_html( $defaults['field_font_size'] ) ?>;
	font-size:var(--field-font-size)<?php echo esc_html( $important ) ?>;
    position:relative;
    display:inline-block;
    zoom:1;
    vertical-align:middle;
	width:100% !important;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
}

.with_frm_style .chosen-container * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.with_frm_style .chosen-container .chosen-drop{
    background:#fff;
    border:1px solid #aaa;
    border-top:0;
    position:absolute;
    top:100%;
    z-index:1010;
    width:100%;
	clip: rect(0, 0, 0, 0);
	-webkit-clip-path: inset(100% 100%);
	clip-path: inset(100% 100%);
}

.with_frm_style .chosen-container.chosen-with-drop .chosen-drop{
	clip: auto;
	-webkit-clip-path: none;
	clip-path: none;
}

.with_frm_style .chosen-container a{
    cursor:pointer;
}

.with_frm_style .chosen-container .search-choice .group-name,
.with_frm_style .chosen-container .chosen-single .group-name {
	margin-right: 4px;
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	font-weight: normal;
	color: #999999;
}

.with_frm_style .chosen-container .search-choice .group-name:after,
.with_frm_style .chosen-container .chosen-single .group-name:after {
	content: ":";
	padding-left: 2px;
	vertical-align: top;
}

.with_frm_style .chosen-container-single .chosen-single{
    position:relative;
    display:block;
    overflow:hidden;
    padding:0 0 0 8px;
    height:25px;
    text-decoration:none;
    white-space:nowrap;
    line-height:24px;
}

.with_frm_style .chosen-container-single .chosen-default {
	color: #999;
}

.with_frm_style .chosen-container-single .chosen-single span{
    margin-right:26px;
    display:block;
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
}

.with_frm_style .chosen-container-single .chosen-single-with-deselect span{
    margin-right:38px;
}

.with_frm_style .chosen-container-single .chosen-single abbr{
    display:block;
    position:absolute;
    right:26px;
    top:6px;
    width:12px;
    height:12px;
    font-size:1px;
    background:url('<?php echo FrmProAppHelper::relative_plugin_url() ?>/images/chosen-sprite.png') -42px 1px no-repeat;
}

.with_frm_style .chosen-container-single .chosen-single abbr:hover{
    background-position:-42px -10px;
}

.with_frm_style .chosen-container-single.chosen-disabled .chosen-single abbr:hover{
    background-position:-42px -10px;
}

.with_frm_style .chosen-container-single .chosen-single div{
    position:absolute;
    right:0;
    top:0;
    display:block;
    height:100%;
    width:18px;
}

.with_frm_style .chosen-container-single .chosen-single div b{
    background:url('<?php echo FrmProAppHelper::relative_plugin_url() ?>/images/chosen-sprite.png') no-repeat 0 2px;
    display:block;
    width:100%;
    height:100%;
}

.with_frm_style .chosen-container-single .chosen-search{
    padding:3px 4px;
    position:relative;
    margin:0;
    white-space:nowrap;
    z-index:1010;
}

.with_frm_style .chosen-container-single .chosen-search input[type="text"]{
    width:100% !important;
    max-width:100% !important;
    height:auto;
    background:url('<?php echo FrmProAppHelper::relative_plugin_url() ?>/images/chosen-sprite.png') no-repeat 100% -20px;
    font-size:1em;
    font-family:sans-serif;
    line-height:normal;
    border-radius:0;
}

.with_frm_style .chosen-container-single .chosen-drop{
    margin-top:-1px;
    border-radius:0 0 4px 4px;
    background-clip:padding-box;
}

.with_frm_style .chosen-container-single.chosen-container-single-nosearch .chosen-search{
    position:absolute;
    clip: rect(0, 0, 0, 0);
	-webkit-clip-path: inset(100% 100%);
	clip-path: inset(100% 100%);
}

.with_frm_style .chosen-container .chosen-results{
    cursor:text;
    overflow-x:hidden;
    overflow-y:auto;
    position:relative;
    margin:0 4px 4px 0;
    padding:0 0 0 4px;
    max-height:240px;
    -webkit-overflow-scrolling:touch;
}

.with_frm_style .chosen-container .chosen-results li:before{
	background:none;
}

.with_frm_style .chosen-container .chosen-results li{
    display:none;
    margin:0;
    padding:5px 6px;
    list-style:none;
    line-height:15px;
    word-wrap:break-word;
    -webkit-touch-callout:none;
}

.with_frm_style .chosen-container .chosen-results li,
.with_frm_style .chosen-container .chosen-results li span{
	color:<?php echo esc_html( $defaults['text_color'] ); ?>;
	color:var(--text-color)<?php echo esc_html( $important ); ?>;
}

.with_frm_style .chosen-container .chosen-results li.active-result{
    display:list-item;
    cursor:pointer;
}

.with_frm_style .chosen-container .chosen-results li.disabled-result{
    display:list-item;
    color:#ccc;
    cursor:default;
}

.with_frm_style .chosen-container .chosen-results li.highlighted{
	background-color: #3875d7;
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(20%, #3875d7), color-stop(90%, #2a62bc));
	background-image: linear-gradient(#3875d7 20%, #2a62bc 90%);
	color: #fff;
}

.with_frm_style .chosen-container .chosen-results li.no-results{
    display:list-item;
    background:#f4f4f4;
}

.with_frm_style .chosen-container .chosen-results li.group-result{
    display:list-item;
    font-weight:bold;
    cursor:default;
}

.with_frm_style .chosen-container .chosen-results li.group-option{
    padding-left:15px;
}

.with_frm_style .chosen-container .chosen-results li em{
    font-style:normal;
    text-decoration:underline;
}

.with_frm_style .chosen-container-multi .chosen-choices{
    position:relative;
    overflow:hidden;
    margin:0;
    padding:0 5px;
    width:100%;
    height:auto;
    border: 1px solid #aaa;
    background-color: #fff;
    cursor:text;
}

.with_frm_style .chosen-container-multi .chosen-choices li{
    float:left;
    list-style:none;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-field{
    margin:0;
    padding:0;
    white-space:nowrap;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
    margin:1px 0;
    padding:0 !important;
    height:25px;
    outline:0;
    border:0 !important;
    background:transparent !important;
    box-shadow:none;
    color:#666;
    font-size:100%;
    font-family:sans-serif;
    line-height:normal;
    border-radius:0;
	width: 25px;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice{
    position:relative;
    margin:1px 5px 1px 0;
    padding:3px 20px 3px 5px;
    border:1px solid #aaa;
    max-width:100%;
    border-radius:3px;
    background-color:#eee;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), to(#eee));
    background-image: linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-size:100% 19px;
    background-repeat:repeat-x;
    background-clip:padding-box;
    box-shadow:0 0 2px white inset, 0 1px 0 rgba(0, 0, 0, 0.05);
    color:#333;
    line-height:13px;
    cursor:default;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice span {
	word-wrap: break-word;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice .search-choice-close{
    position:absolute;
    top:4px;
    right:3px;
    display:block;
    width:12px;
    height:12px;
    background:url('<?php echo FrmProAppHelper::relative_plugin_url() ?>/images/chosen-sprite.png') -42px 1px no-repeat;
    font-size:1px;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover{
    background-position:-42px -10px;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice-disabled{
    padding-right:5px;
    border:1px solid #ccc;
    background-color:#e4e4e4;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), to(#eee));
    background-image: linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    color:#666;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice-focus{
    background:#d4d4d4;
}

.with_frm_style .chosen-container-multi .chosen-choices li.search-choice-focus .search-choice-close{
    background-position:-42px -10px;
}

.with_frm_style .chosen-container-multi .chosen-results{
    margin:0;
    padding:0;
}

.with_frm_style .chosen-container-multi .chosen-drop .result-selected{
    display:list-item;
    color:#ccc;
    cursor:default;
}

.with_frm_style .chosen-container-single.chosen-container-active .chosen-single{
    border:1px solid #5897fb;
    box-shadow:0 0 5px rgba(0, 0, 0, 0.3);
}

.with_frm_style .chosen-container-single.chosen-container-active.chosen-with-drop .chosen-single{
    border:1px solid #aaa;
    border-bottom-right-radius:0;
    border-bottom-left-radius:0;
    box-shadow:0 1px 0 #fff inset;
}

.with_frm_style .chosen-container-single.chosen-container-active.chosen-with-drop .chosen-single div{
    border-left:none;
    background:transparent;
}

.with_frm_style .chosen-container-single.chosen-container-active.chosen-with-drop .chosen-single div b{
    background-position:-18px 2px;
}

.with_frm_style .chosen-container-active .chosen-choices {
	border: 1px solid #5897fb;
	-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
	        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.with_frm_style .chosen-container-active .chosen-choices li.search-field input[type="text"]{
    color:#111 !important;
}

.with_frm_style .chosen-disabled{
    opacity:0.5 !important;
    cursor:default;
}

.with_frm_style .chosen-disabled .chosen-single{
    cursor:default;
}

.with_frm_style .chosen-disabled .chosen-choices .search-choice .search-choice-close{
    cursor:default;
}

.with_frm_style .chosen-rtl{
    text-align:right;
}

.with_frm_style .chosen-rtl .chosen-single{
    overflow:visible;
    padding:0 8px 0 0;
}

.with_frm_style .chosen-rtl .chosen-single span{
    margin-right:0;
    margin-left:26px;
    direction:rtl;
}

.with_frm_style .chosen-rtl .chosen-single-with-deselect span{
    margin-left:38px;
}

.with_frm_style .chosen-rtl .chosen-single div{
    right:auto;
    left:3px;
}

.with_frm_style .chosen-rtl .chosen-single abbr{
    right:auto;
    left:26px;
}

.with_frm_style .chosen-rtl .chosen-choices li{
    float:right;
}

.with_frm_style .chosen-rtl .chosen-choices li.search-field input[type="text"]{
    direction:rtl;
}

.with_frm_style .chosen-rtl .chosen-choices li.search-choice{
    margin:1px 5px 1px 0;
    padding:3px 5px 3px 19px;
}

.with_frm_style .chosen-rtl .chosen-choices li.search-choice .search-choice-close{
	right:auto;
	left:4px;
}

.with_frm_style .chosen-rtl.chosen-container-single .chosen-results{
    margin:0 0 4px 4px;
    padding:0 4px 0 0;
}

.with_frm_style .chosen-rtl .chosen-results li.group-option{
    padding-right:15px;
    padding-left:0;
}

.with_frm_style .chosen-rtl.chosen-container-active.chosen-with-drop .chosen-single div{
    border-right:none;
}

.with_frm_style .chosen-rtl .chosen-search input[type="text"]{
    padding:4px 5px 4px 20px;
    background:url('<?php echo FrmProAppHelper::relative_plugin_url() ?>/images/chosen-sprite.png') no-repeat -30px -20px;
    direction:rtl;
}

.with_frm_style .chosen-rtl.chosen-container-single .chosen-single div b{
    background-position:6px 2px;
}

.with_frm_style .chosen-rtl.chosen-container-single.chosen-with-drop .chosen-single div b{
    background-position:-12px 2px;
}

/** Fix for overlapping options **/
.with_frm_style .frm_repeat_sec,
.with_frm_style .frm_repeat_inline,
.with_frm_style .frm_repeat_grid {
	position: relative;
}

@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-resolution: 144dpi){
    .with_frm_style .chosen-rtl .chosen-search input[type="text"],
    .with_frm_style .chosen-container-single .chosen-single abbr,
    .with_frm_style .chosen-container-single .chosen-single div b,
    .with_frm_style .chosen-container-single .chosen-search input[type="text"],
    .with_frm_style .chosen-container-multi .chosen-choices .search-choice .search-choice-close,
    .with_frm_style .chosen-container .chosen-results-scroll-down span,
    .with_frm_style .chosen-container .chosen-results-scroll-up span{
        background-image:url('<?php echo FrmProAppHelper::relative_plugin_url() ?>/images/chosen-sprite2x.png') !important;
        background-size:52px 37px !important;
        background-repeat:no-repeat !important;
    }
}

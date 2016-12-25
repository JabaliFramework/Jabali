<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Djenga Builder shortcodes
 *
 * @package DJengaVisualComposer
 *
 */
class DJengaShortCode_VC_Wp_Search extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Meta extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Recentcomments extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Calendar extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Pages extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Tagcloud extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Custommenu extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Text extends DJengaShortCode {
	/**
	 * This actually fixes #1537 by converting 'text' to 'content'
	 * @since 4.4
	 *
	 * @param $atts
	 *
	 * @return mixed
	 */
	public static function convertTextAttributeToContent( $atts ) {
		if ( isset( $atts['text'] ) ) {
			if ( ! isset( $atts['content'] ) || empty( $atts['content'] ) ) {
				$atts['content'] = $atts['text'];
			}
		}

		return $atts;
	}
}

class DJengaShortCode_VC_Wp_Posts extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Links extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Categories extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Archives extends DJengaShortCode {
}

class DJengaShortCode_VC_Wp_Rss extends DJengaShortCode {
}

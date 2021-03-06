<?php
/**
 * Author: Hoang Ngo
 */

namespace WP_Defender\Behavior;

use Hammer\Base\Behavior;
use WP_Defender\Component\Error_Code;

class Blacklist_Free extends Behavior {
	public function renderBlacklistWidget() {
		$this->_renderFree();
	}

	private function _renderFree() {
		?>
        <div class="dev-box">
            <div class="box-title">
                <span class="span-icon icon-blacklist"></span>
                <h3><?php _e( "BLACKLIST MONITOR", "defender-security" ) ?></h3>
                <a href="#pro-feature" rel="dialog"
                   class="button button-small button-pre" 
				   tooltip="<?php esc_attr_e( "Try Defender Pro free today", "defender-security" ) ?>">
				   <?php _e( "PRO FEATURE", "defender-security" ) ?></a>
            </div>
            <div class="box-content">
                <div class="line">
					<?php _e( "Automatically check if you’re on Google’s blacklist every 6 hours. If something’s
                    wrong, we’ll let you know via email.", "defender-security" ) ?>
                </div>
                <a href="#pro-feature" rel="dialog"
                   class="button button-green button-small"><?php esc_html_e( "Upgrade to Pro", "defender-security" ) ?></a>
            </div>
        </div>
		<?php
	}
}
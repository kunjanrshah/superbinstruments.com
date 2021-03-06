<div class="wrap">
    <div id="wp-defender" class="wp-defender">
        <div class="def-dashboard">
            <h2 class="title"><?php _e( "Dashboard", "defender-security" ) ?></h2>
            <div class="dev-box summary-box">
                <div class="box-content">
                    <div class="columns">
                        <div class="column is-7 issues-count">
                            <div>
                                <h5 class=""><?php list( $hCount, $sCount ) = $controller->countTotalIssues( true );
									$countAll = $hCount + $sCount;
									echo $countAll;
									?></h5>
								<?php if ( $countAll == 0 ): ?>
                                <span class=""
                                      tooltip="<?php esc_attr_e( 'You have no outstanding security issues.', "defender-security" ); ?>">
                                        <i class="def-icon icon-tick" aria-hidden="true"></i>
									<?php else: ?>
									<?php
									if ( $sCount > 0 && $hCount > 0 ) :
									?>
                                    <span class=""
                                          tooltip="<?php esc_attr_e( sprintf( __( 'You have %d security tweak(s)  and %d suspicious file(s) needing attention.', "defender-security" ), $hCount, $sCount ) ); ?>">
                                        <?php elseif ( $hCount > 0 ): ?>
                                        <span class=""
                                              tooltip="<?php esc_attr_e( sprintf( __( 'You have %d security tweak(s) needing attention.', "defender-security" ), $hCount ) ); ?>">
                                        <?php elseif ( $sCount > 0 ): ?>
                                            <span class=""
                                                  tooltip="<?php esc_attr_e( sprintf( __( 'You have %d suspicious file(s) needing attention.', "defender-security" ), $sCount ) ); ?>">
                                        <?php else: ?>
                                                <span class=""
                                                      tooltip="<?php esc_attr_e( 'You have no outstanding security issues.', "defender-security" ); ?>">
                                        <?php endif; ?>
                                                    <i class="def-icon icon-warning icon-yellow <?php echo $sCount > 0 ? 'fill-red' : null ?>" aria-hidden="true"></i>
													<?php endif; ?>
                                </span>
                                <div class="clear"></div>
                                <span class="sub"><?php
	                                _e( "security issues", "defender-security" ) ?></span>
                            </div>
                        </div>
                        <div class="column is-5">
                            <ul class="dev-list bold">
                                <li>
                                    <div>
                                        <span class="list-label"><?php _e( "Security tweaks actioned", "defender-security" ) ?></span>
                                        <span class="list-detail"><span>
                                            <?php
                                            $settings = \WP_Defender\Module\Hardener\Model\Settings::instance();
                                            echo count( $settings->fixed ) + count( $settings->ignore ) ?>
                                                /
												<?php echo count( $settings->getDefinedRules() ) ?>
                                        </span></span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span class="list-label"><?php _e( "File Scan Issues", "defender-security" ) ?></span>
                                        <span class="list-detail">
                                       <?php echo $controller->renderScanStatusText() ?>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <span class="list-label"><?php _e( "Last Lockout" ) ?></span>
                                        <span class="list-detail lastLockout">.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row is_multiline">
                <div class="col-half">
					<?php echo $controller->renderHardenerWidget() ?>
					<?php $controller->renderBlacklistWidget() ?>
					<?php $controller->renderAuditWidget() ?>
					<?php $controller->renderATWidget() ?>
					<?php if ( wp_defender()->isFree ): ?>
                        <div class="dev-box dev-team">
                            <div class="box-title">
                                <h3><?php _e( "TRY PRO FEATURES FOR FREE!", "defender-security" ) ?></h3>
                            </div>
                            <div class="box-content tc">
                                <div class="line">
									<?php _e( "Upgrade to Defender Pro to unlock Advanced File Scanning, Blacklist Monitoring, Audit Logging and automated reporting for Audit Logging, IP Lockouts and File Scans.", "defender-security" ) ?>
                                </div>
                                <div class="line">
									<?php _e( "Get all this as part of a WPMU DEV Membership, and the best part is you can try everything absolutely free.", "defender-security" ) ?>
                                </div>
                                <a href="https://premium.wpmudev.org/project/wp-defender/" target="_blank"
                                   class="button button-green"><?php _e( "FIND OUT MORE", "defender-security" ) ?></a>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
                <div class="col-half">
					<?php $controller->renderScanWidget() ?>
					<?php $controller->renderLockoutWidget() ?>
					<?php $controller->renderReportWidget() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ( $controller->isShowActivator() ) {
	$view = wp_defender()->isFree ? 'activator-free' : 'activator';
	$controller->renderPartial( $view );
} ?>
<?php
if ( wp_defender()->isFree ) {
	$controller->renderPartial( 'pro-feature' );
}
?>

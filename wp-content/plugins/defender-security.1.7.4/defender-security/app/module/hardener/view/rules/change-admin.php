<div class="rule closed" id="change_admin">
    <div class="rule-title">
		<?php if ( $controller->check() == false ): ?>
            <i class="def-icon icon-warning" aria-hidden="true"></i>
		<?php else: ?>
            <i class="def-icon icon-tick" aria-hidden="true"></i>
		<?php endif; ?>
		<?php _e( "Change default admin user account", "defender-security" ) ?>
    </div>
    <div class="rule-content">
        <h3><?php _e( "Overview", "defender-security" ) ?></h3>
        <div class="line end">
			<?php _e( "If you're using the default admin login name, you're giving away an important piece of the puzzle hackers
            need to hijack your website. Having a default admin user account is bad practice, but one that's easily
            fixed. Ensure you backup your database before choosing a new username.", "defender-security" ) ?>
        </div>
        <h3>
			<?php _e( "How to fix", "defender-security" ) ?>
        </h3>
        <div class="well has-input">
			<?php if ( $controller->check() ): ?>
				<?php _e( "You don’t have a user with username admin.", "defender-security" ) ?>
			<?php else: ?>
                <div class="line">
                    <p><?php _e( "Please change the username from admin to something unique.", "defender-security" ) ?></p>
                </div>
                <form method="post" class="hardener-frm rule-process">
					<?php $controller->createNonceField(); ?>
                    <input type="hidden" name="action" value="processHardener"/>
                    <input type="text" placeholder="<?php esc_attr_e( "Enter new username", "defender-security" ) ?>"
                           name="username" class="block" />
                    <input type="hidden" name="slug" value="<?php echo $controller::$slug ?>"/>
                    <button class="button float-r"
                            type="submit"><?php _e( "Update", "defender-security" ) ?></button>
                </form>
				<?php $controller->showIgnoreForm() ?>
                <div class="clear"></div>
			<?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
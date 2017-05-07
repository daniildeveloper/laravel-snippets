<?php if (!defined('ABSPATH')) exit; ?>
<div class="alert">
	<h3><?php _e('Error!', 'ol-scrapes'); ?></h3>
	<p><i class="icon ion-android-alert"></i> <?php _e('This page requires JavaScript to run properly.', 'ol-scrapes'); ?></p>
</div>

<div class="bootstrap" ng-app="octolooks" ng-controller="settings" ng-cloak ng-init="
model.pc = '<?php echo esc_js(get_option('scrapes_code')); ?>';
model.pc_domain = '<?php echo esc_js(get_option('scrapes_domain')) ? esc_js(get_option('scrapes_domain')) : 'http://'; ?>';
model.pc_request_domain = '<?php echo esc_js(get_site_url()); ?>';
model.pc_valid = <?php echo esc_js(get_option('scrapes_valid')) == 1 ? 'true': 'false'; ?>;
model.pc_signed = model.pc_valid;
model.action = 'save_scrapes_settings';
init();
">
	<form method="post" action="admin-post.php" name="form" novalidate>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
					<div class="form-horizontal">
						<div class="jumbotron">
							<h1><?php _e('Settings', 'ol-scrapes'); ?> ¨¨W¨P¨L¨O¨C¨K¨E¨R¨.¨C¨O¨M¨¨</h1>
							<p><?php _e('Modify options and save changes.', 'ol-scrapes'); ?></p>
						</div>

						<div class="panel-group">
							<div class="panel">
								<div class="panel-heading">
									<h4><a href="#collapse-0" data-toggle="collapse"><i class="icon ion-locked"></i><?php _e('License Options', 'ol-scrapes'); ?></a></h4>
								</div>

								<div id="collapse-0" class="panel-collapse collapse in">
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-4 control-label"><?php _e('Purchase Code', 'ol-scrapes'); ?> <i class="icon ion-help-circled" data-toggle="popover" data-content="<?php _e('The fields to set 36 character long purchase code and domain name without subdomain, starting with http which the plugin is defined to run on.', 'ol-scrapes'); ?>"></i></label>
											<div class="col-sm-8">
												<div class="form-group">
													<div class="col-sm-12" ng-class="{'has-error' : form.purchase_code.$invalid && (form.purchase_code.$dirty || submitted)}">
														<p class="help-block success" ng-if="model.pc_valid"><i class="icon ion-checkmark-circled"></i> <?php _e('Purchase code is validated.', 'ol-scrapes'); ?></p>
														<div class="input-group">
															<div class="input-group-addon"><?php _e('Code', 'ol-scrapes'); ?></div>
															<input type="text" name="purchase_code" placeholder="•••••••• - •••• - •••• - •••• - ••••••••••••" class="form-control" maxlength="36" ng-model="model.pc" ng-readonly="model.pc_valid" ng-required="true" ng-pattern="/[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}/">
															<span class="input-group-btn" ng-if="model.pc_valid"><button type="submit" class="btn btn-primary btn-block" ng-click="remove_pc()"><i class="icon ion-trash-a"></i></button></span>
														</div>
														<p class="help-block" ng-show="form.purchase_code.$invalid && (form.purchase_code.$dirty || submitted)"><?php _e('Please enter a valid value.', "ol-scrapes"); ?></p>
													</div>
													<div class="col-sm-12" ng-class="{'has-error' : form.domain.$invalid && (form.domain.$dirty || submitted)}">
														<div class="input-group">
															<div class="input-group-addon"><?php _e('Domain', "ol-scrapes"); ?></div>
															<input type="text" name="domain" placeholder="<?php _e('e.g. http://octolooks.com', 'ol-scrapes'); ?>" class="form-control" ng-model="model.pc_domain" ng-readonly="model.pc_valid" ng-required="true" ng-pattern="/^http:///" ng-minlength="10">
														</div>
														<p class="help-block" ng-show="form.domain.$invalid && (form.domain.$dirty || submitted)"><?php _e('Please enter a valid value.', 'ol-scrapes'); ?></p>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-12" ng-class="{'has-error' : form.signed.$invalid && (form.signed.$dirty || submitted)}">
														<div class="checkbox license"><label><input type="checkbox" name="signed" ng-model="model.pc_signed" ng-checked="model.pc_valid" ng-disabled="model.pc_valid" ng-required="true"> <?php _e('I confirm that my purchase code will be defined for a single domain name at first validation according to <a href="https://codecanyon.net/licenses/terms/regular" target="_blank">regular license</a> terms. It will be valid only for domain name that I entered including subdomain names and localhost for testing purposes.', 'ol-scrapes'); ?></label></div>
														<p class="help-block" ng-show="form.signed.$invalid && (form.signed.$dirty || submitted)"><?php _e('Must be confirmed in order to continue.', 'ol-scrapes'); ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="sidebar">
						<div class="action">
							<input type="text" name="request_domain" class="hidden" ng-model="model.pc_request_domain">
							<input type="text" name="action" class="hidden" ng-model="model.action">
							<?php wp_nonce_field('scrapes_settings'); ?>
							<button type="submit" name="submit" class="btn btn-lg btn-block btn-primary" ><?php _e('Save', 'ol-scrapes'); ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
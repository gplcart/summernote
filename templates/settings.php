<?php
/**
 * @package Summernote
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */
?>
<form method="post" class="form-horizontal">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group required<?php echo $this->error('selector', ' has-error'); ?>">
        <label class="col-md-2 control-label"><?php echo $this->text('Selector'); ?></label>
        <div class="col-md-6">
          <textarea name="settings[selector]" rows="4" class="form-control"><?php echo $this->e($settings['selector']); ?></textarea>
          <div class="help-block">
            <?php echo $this->error('selector'); ?>
            <div class="text-muted">
              <?php echo $this->text('List of CSS selectors to determine target elements that will be rendered to Summernote editor'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group required<?php echo $this->error('config', ' has-error'); ?>">
        <label class="col-md-2 control-label"><?php echo $this->text('Config'); ?></label>
        <div class="col-md-6">
          <textarea name="settings[config]" rows="4" class="form-control"><?php echo $this->e($settings['config']); ?></textarea>
          <div class="help-block">
            <?php echo $this->error('config'); ?>
            <div class="text-muted">
              <?php echo $this->text('JSON string with global <a target="_blank" href="http://summernote.org/getting-started">configuration</a>. You can override this configuration with inline settings from <i>data-wysiwyg-settings</i> attribute'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          <a href="<?php echo $this->url("admin/module/list"); ?>" class="btn btn-default"><?php echo $this->text("Cancel"); ?></a>
          <button class="btn btn-default save" name="save" value="1"><?php echo $this->text("Save"); ?></button>
        </div>
      </div>
    </div>
  </div>
</form>
<?php
/**
 * The template for displaying contact modal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

?>

<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal modal-content">
            <div class="modal-image"></div>
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal__title"><span><?php _e('Contact with us') ?></span></h2>
                <?php echo do_shortcode('[contact-form-7 id="4"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php

/**
 * Plugin Name:       Let's level - Business Card
 * Description:       A simple business card block for you to enjoy.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.0.9
 * Author:            Let's Level
 * Author URI:        https://letslevel.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       letslevel-business-card
 *
 * @package           create-block
 */

require 'build/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/letslevel/letslevel-business-card/',
	__FILE__,
	'letslevel-business-card'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_letslevel_business_card_block_init()
{
	register_block_type(__DIR__ . '/build');
}
add_action('init', 'create_block_letslevel_business_card_block_init');

function letslevel_business_card($attributes)
{

	$attributes = wp_parse_args(
		$attributes,
		[
			'image' => '',
			'logo' => '',
			'name' => '',
			'company' => '',
			'title' => '',
			'email' => '',
			'phone' => '',
			'website' => '',
			'address' => '',
			'slogan' => '',
			'cta_text' => '',
			'cta_link' => '',
			'link_color' => 'purple',
			'title_color' => 'indigo',
			'front_background_color' => '#ffffff',
			'back_background_color' => '#e2e2e2',
		]
	);

	extract($attributes);


	$phone_numbers_only = preg_replace('/[^0-9]/', '', $phone);

?>

	<div class="letslevel-business-card" style="
					--link_color: <?= $link_color ?>;
					--title_color: <?= $title_color ?>;
					--link_color: <?= $link_color ?>;
					--front_background_color: <?= $front_background_color ?>;
					--back_background_color: <?= $back_background_color ?>;
				">

		<div class="letslevel-business-card__flipper">

			<div class="letslevel-business-card__front">




				<div class="letslevel-business-card__logo">
					<img src="<?php echo $logo; ?>" alt="<?php echo $name; ?>" />
				</div>

				<div class="letslevel-business-card__image">
					<img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" />
				</div>

				<div class="letslevel-business-card__content">
					<div class="letslevel-business-card__head">
						<h2 class="letslevel-business-card__name"><?php echo $name; ?></h2>
						<h4 class="letslevel-business-card__title"><?php echo $title; ?> <span style="white-space: nowrap;">at <?php echo $company ?></span></h4>
					</div>
					<div class="letslevel-business-card__body">
						<p class="letslevel-business-card__phone"><a href="tel:+<?php echo $phone_numbers_only; ?>"><?php echo $phone; ?></a></p>
						<p class="letslevel-business-card__email"><a href="mailto:<?php echo $email; ?>?subject=Saw your business card"><?php echo $email; ?></a></p>
					</div>
				</div>

				<a href="#" class="letslevel-business-card__flip" onclick="
				event.preventDefault();
				const card = this.closest('.letslevel-business-card');
				card.classList.toggle('show-back');
				console.log(card);
			">
					<span class="label"><span>Flip</span></span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 icon">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
					</svg>
				</a>

			</div>

			<div class="letslevel-business-card__back">

				<div class="letslevel-business-card__logo">
					<img src="<?php echo $logo; ?>" alt="<?php echo $name; ?>" />
				</div>

				<div class="letslevel-business-card__content">
					<div class="letslevel-business-card__head">
						<h3 class="letslevel-business-card__name"><?php echo $company; ?></h3>
						<h4 class="letslevel-business-card__slogan"><em><?php echo $slogan; ?></em></h4>
					</div>
					<div class="letslevel-business-card__body">
						<div>
							<p class="letslevel-business-card__website"><a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></p>
							<p class="letslevel-business-card__address"><?php echo $address; ?></p>
						</div>
						<div class="letslevel-business-card__cta">
							<a href="<?php echo $cta_link; ?>" class="letslevel-business-card__cta-link"><?php echo $cta_text; ?></a>
						</div>
					</div>
				</div>

				<a href="#" class="letslevel-business-card__flip" onclick="
				event.preventDefault();
				const card = this.closest('.letslevel-business-card');
				card.classList.toggle('show-back');
				console.log(card);
			">
					<span class="label"><span>Flip</span></span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 icon">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
					</svg>
				</a>

			</div>



		</div>





	</div>

<?php


}

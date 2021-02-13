import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

// https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
// https://make.wordpress.org/core/2020/11/18/block-api-version-2/
// https://www.npmjs.com/package/@wordpress/scripts#using-css

import './style.scss';
import Edit from './edit';
import save from './save';

registerBlockType( 'hsq/hsq-project-link', {
	apiVersion: 2,
	title: __( 'Poject Link', 'hsq-project-link' ),
	description: __(
		'Shows an image next to a heading and a short descriptive text',
		'hsq-project-link'
	),
	category: 'widgets',
	icon: 'align-pull-left',
	supports: {	html: false,}, // Removes support for an HTML mode.

	edit: Edit,
	save,

	attributes: {},
} );

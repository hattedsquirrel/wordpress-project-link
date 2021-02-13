import { __ } from '@wordpress/i18n';

// https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
// https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes, className }) {
	return (
		<div {...useBlockProps.save()}>
			<InnerBlocks.Content />
		</div>
	);
}


import { __ } from '@wordpress/i18n';

// https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
// https://www.npmjs.com/package/@wordpress/scripts#using-css
import './editor.scss';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Edit({ attributes, className, setAttributes }) {
	return (
         <div {...useBlockProps()}>
			<InnerBlocks
				template={[
					['core/image',{} ],
					['core/heading',{placeholder: __('Title', 'hsq-project-link'), level: 2}],
					['core/paragraph',{placeholder: __('Description', 'hsq-project-link')}]
				]}
				templateLock='all'
			/>
        </div>
	);
}

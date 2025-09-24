<?php
/**
 * Page Builder System for Future Theme
 * This works alongside the existing Green House template without breaking it
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Page Builder Meta Box
 */
function future_add_page_builder_meta_box() {
    add_meta_box(
        'page-builder',
        'Page Builder Blocks',
        'future_page_builder_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'future_add_page_builder_meta_box');

/**
 * Page Builder Meta Box Callback
 */
function future_page_builder_meta_box_callback($post) {
    wp_nonce_field('future_page_builder_nonce', 'future_page_builder_nonce');
    
    $blocks = get_post_meta($post->ID, '_page_builder_blocks', true);
    if (!is_array($blocks)) {
        $blocks = array();
    }
    
    ?>
    <div id="page-builder">
        <div class="page-builder-toolbar">
            <h3>Add New Block</h3>
            <select id="block-type-selector">
                <option value="">Select Block Type</option>
                <option value="hero-slider">Hero Slider</option>
                <option value="text-image-right">Text + Image (Right)</option>
                <option value="text-image-left">Text + Image (Left)</option>
                <option value="benefits">Benefits</option>
                <option value="location">Location</option>
                <option value="apartments">Apartments Selection</option>
                <option value="visualizations">Visualizations Slider</option>
                <option value="contact">Contact</option>
            </select>
            <button type="button" id="add-block-btn" class="button button-primary">Add Block</button>
        </div>
        
        <div id="blocks-container" class="blocks-container">
            <?php foreach ($blocks as $index => $block): ?>
                <div class="block-item" data-block-type="<?php echo esc_attr($block['type']); ?>" data-block-index="<?php echo $index; ?>">
                    <div class="block-header">
                        <span class="block-title"><?php echo esc_html(ucfirst(str_replace('-', ' ', $block['type']))); ?></span>
                        <div class="block-actions">
                            <button type="button" class="button edit-block">Edit</button>
                            <button type="button" class="button remove-block">Remove</button>
                            <button type="button" class="button move-up">↑</button>
                            <button type="button" class="button move-down">↓</button>
                        </div>
                    </div>
                    <div class="block-content" style="display: none;">
                        <?php future_render_block_editor($block['type'], $block['data'], $index); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <input type="hidden" id="page-builder-blocks" name="page_builder_blocks" value="<?php echo esc_attr(json_encode($blocks)); ?>">
    </div>
    
    <style>
    .page-builder-toolbar {
        background: #f1f1f1;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    }
    
    .page-builder-toolbar h3 {
        margin-top: 0;
    }
    
    .page-builder-toolbar select {
        margin-right: 10px;
    }
    
    .blocks-container {
        min-height: 100px;
    }
    
    .block-item {
        border: 1px solid #ddd;
        margin-bottom: 10px;
        background: #fff;
    }
    
    .block-header {
        background: #f9f9f9;
        padding: 10px 15px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .block-title {
        font-weight: bold;
    }
    
    .block-actions {
        display: flex;
        gap: 5px;
    }
    
    .block-content {
        padding: 15px;
    }
    
    .block-field {
        margin-bottom: 15px;
    }
    
    .block-field label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    .block-field input,
    .block-field textarea,
    .block-field select {
        width: 100%;
        max-width: 500px;
    }
    
    .block-field textarea {
        height: 100px;
    }
    
    .repeater-item {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        background: #f9f9f9;
    }
    
    .repeater-item h4 {
        margin-top: 0;
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        let blockIndex = <?php echo count($blocks); ?>;
        
        // Add new block
        $('#add-block-btn').click(function() {
            const blockType = $('#block-type-selector').val();
            if (!blockType) {
                alert('Please select a block type');
                return;
            }
            
            const blockHtml = generateBlockHtml(blockType, blockIndex);
            $('#blocks-container').append(blockHtml);
            blockIndex++;
            updateBlocksData();
        });
        
        // Edit block
        $(document).on('click', '.edit-block', function() {
            const blockContent = $(this).closest('.block-item').find('.block-content');
            blockContent.toggle();
        });
        
        // Remove block
        $(document).on('click', '.remove-block', function() {
            if (confirm('Are you sure you want to remove this block?')) {
                $(this).closest('.block-item').remove();
                updateBlocksData();
            }
        });
        
        // Move block up
        $(document).on('click', '.move-up', function() {
            const block = $(this).closest('.block-item');
            block.insertBefore(block.prev());
            updateBlocksData();
        });
        
        // Move block down
        $(document).on('click', '.move-down', function() {
            const block = $(this).closest('.block-item');
            block.insertAfter(block.next());
            updateBlocksData();
        });
        
        // Update block data when fields change
        $(document).on('change input', '.block-field input, .block-field textarea, .block-field select', function() {
            updateBlocksData();
        });
        
        function generateBlockHtml(blockType, index) {
            const blockTitles = {
                'hero-slider': 'Hero Slider',
                'text-image-right': 'Text + Image (Right)',
                'text-image-left': 'Text + Image (Left)',
                'benefits': 'Benefits',
                'location': 'Location',
                'apartments': 'Apartments Selection',
                'visualizations': 'Visualizations Slider',
                'contact': 'Contact'
            };
            
            return `
                <div class="block-item" data-block-type="${blockType}" data-block-index="${index}">
                    <div class="block-header">
                        <span class="block-title">${blockTitles[blockType]}</span>
                        <div class="block-actions">
                            <button type="button" class="button edit-block">Edit</button>
                            <button type="button" class="button remove-block">Remove</button>
                            <button type="button" class="button move-up">↑</button>
                            <button type="button" class="button move-down">↓</button>
                        </div>
                    </div>
                    <div class="block-content">
                        ${generateBlockFields(blockType, index)}
                    </div>
                </div>
            `;
        }
        
        function generateBlockFields(blockType, index) {
            const fields = {
                'hero-slider': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Subtitle:</label>
                        <input type="text" name="blocks[${index}][subtitle]" value="">
                    </div>
                    <div class="block-field">
                        <label>Button Text:</label>
                        <input type="text" name="blocks[${index}][button_text]" value="">
                    </div>
                    <div class="block-field">
                        <label>Button URL:</label>
                        <input type="url" name="blocks[${index}][button_url]" value="">
                    </div>
                    <div class="block-field">
                        <label>Background Images (one per line):</label>
                        <textarea name="blocks[${index}][images]" placeholder="Enter image URLs, one per line"></textarea>
                    </div>
                `,
                'text-image-right': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Content:</label>
                        <textarea name="blocks[${index}][content]" value=""></textarea>
                    </div>
                    <div class="block-field">
                        <label>Button Text:</label>
                        <input type="text" name="blocks[${index}][button_text]" value="">
                    </div>
                    <div class="block-field">
                        <label>Button URL:</label>
                        <input type="url" name="blocks[${index}][button_url]" value="">
                    </div>
                    <div class="block-field">
                        <label>Image URL:</label>
                        <input type="url" name="blocks[${index}][image]" value="">
                    </div>
                `,
                'text-image-left': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Content:</label>
                        <textarea name="blocks[${index}][content]" value=""></textarea>
                    </div>
                    <div class="block-field">
                        <label>Button Text:</label>
                        <input type="text" name="blocks[${index}][button_text]" value="">
                    </div>
                    <div class="block-field">
                        <label>Button URL:</label>
                        <input type="url" name="blocks[${index}][button_url]" value="">
                    </div>
                    <div class="block-field">
                        <label>Image URL:</label>
                        <input type="url" name="blocks[${index}][image]" value="">
                    </div>
                `,
                'benefits': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Content:</label>
                        <textarea name="blocks[${index}][content]" value=""></textarea>
                    </div>
                    <div class="block-field">
                        <label>Button Text:</label>
                        <input type="text" name="blocks[${index}][button_text]" value="">
                    </div>
                    <div class="block-field">
                        <label>Button URL:</label>
                        <input type="url" name="blocks[${index}][button_url]" value="">
                    </div>
                    <div class="block-field">
                        <label>Background Image URL:</label>
                        <input type="url" name="blocks[${index}][background_image]" value="">
                    </div>
                    <div class="block-field">
                        <label>Benefits (one per line, format: Icon URL|Title|Description):</label>
                        <textarea name="blocks[${index}][benefits]" placeholder="Icon URL|Title|Description"></textarea>
                    </div>
                `,
                'location': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Content:</label>
                        <textarea name="blocks[${index}][content]" value=""></textarea>
                    </div>
                    <div class="block-field">
                        <label>Google Maps Embed Code:</label>
                        <textarea name="blocks[${index}][map_embed]" placeholder="Paste Google Maps embed code here"></textarea>
                    </div>
                    <div class="block-field">
                        <label>Location Items (one per line, format: Icon URL|Time|Name):</label>
                        <textarea name="blocks[${index}][locations]" placeholder="Icon URL|Time|Name"></textarea>
                    </div>
                `,
                'apartments': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Description:</label>
                        <textarea name="blocks[${index}][description]" value=""></textarea>
                    </div>
                    <div class="block-field">
                        <label>Floor Plan Image URL:</label>
                        <input type="url" name="blocks[${index}][floor_plan]" value="">
                    </div>
                    <div class="block-field">
                        <label>Apartments (one per line, format: Number|Rooms|Area|Garden|Status|Price|Plan URL):</label>
                        <textarea name="blocks[${index}][apartments]" placeholder="A1.1|4|55|245|available|Zapytaj o cenę|#"></textarea>
                    </div>
                `,
                'visualizations': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Images (one per line):</label>
                        <textarea name="blocks[${index}][images]" placeholder="Enter image URLs, one per line"></textarea>
                    </div>
                `,
                'contact': `
                    <div class="block-field">
                        <label>Title:</label>
                        <input type="text" name="blocks[${index}][title]" value="">
                    </div>
                    <div class="block-field">
                        <label>Company Logo URL:</label>
                        <input type="url" name="blocks[${index}][company_logo]" value="">
                    </div>
                    <div class="block-field">
                        <label>Address:</label>
                        <textarea name="blocks[${index}][address]" value=""></textarea>
                    </div>
                    <div class="block-field">
                        <label>Email:</label>
                        <input type="email" name="blocks[${index}][email]" value="">
                    </div>
                    <div class="block-field">
                        <label>Phone:</label>
                        <input type="tel" name="blocks[${index}][phone]" value="">
                    </div>
                    <div class="block-field">
                        <label>Company Details:</label>
                        <textarea name="blocks[${index}][company_details]" value=""></textarea>
                    </div>
                `
            };
            
            return fields[blockType] || '';
        }
        
        function updateBlocksData() {
            const blocks = [];
            $('.block-item').each(function() {
                const blockType = $(this).data('block-type');
                const blockData = {};
                
                $(this).find('input, textarea, select').each(function() {
                    const name = $(this).attr('name');
                    if (name && name.startsWith('blocks[')) {
                        const fieldName = name.match(/\[([^\]]+)\]$/)[1];
                        blockData[fieldName] = $(this).val();
                    }
                });
                
                blocks.push({
                    type: blockType,
                    data: blockData
                });
            });
            
            $('#page-builder-blocks').val(JSON.stringify(blocks));
        }
    });
    </script>
    <?php
}

/**
 * Save Page Builder Data
 */
function future_save_page_builder_data($post_id) {
    if (!isset($_POST['future_page_builder_nonce']) || 
        !wp_verify_nonce($_POST['future_page_builder_nonce'], 'future_page_builder_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['page_builder_blocks'])) {
        $blocks = json_decode(stripslashes($_POST['page_builder_blocks']), true);
        update_post_meta($post_id, '_page_builder_blocks', $blocks);
    }
}
add_action('save_post', 'future_save_page_builder_data');

/**
 * Render Block Editor
 */
function future_render_block_editor($block_type, $data, $index) {
    $data = $data ?: array();
    
    switch ($block_type) {
        case 'hero-slider':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Subtitle:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][subtitle]" value="<?php echo esc_attr($data['subtitle'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Button Text:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][button_text]" value="<?php echo esc_attr($data['button_text'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Button URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][button_url]" value="<?php echo esc_attr($data['button_url'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Background Images (one per line):</label>
                <textarea name="blocks[<?php echo $index; ?>][images]" placeholder="Enter image URLs, one per line"><?php echo esc_textarea($data['images'] ?? ''); ?></textarea>
            </div>
            <?php
            break;
            
        case 'text-image-right':
        case 'text-image-left':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Content:</label>
                <textarea name="blocks[<?php echo $index; ?>][content]"><?php echo esc_textarea($data['content'] ?? ''); ?></textarea>
            </div>
            <div class="block-field">
                <label>Button Text:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][button_text]" value="<?php echo esc_attr($data['button_text'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Button URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][button_url]" value="<?php echo esc_attr($data['button_url'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Image URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][image]" value="<?php echo esc_attr($data['image'] ?? ''); ?>">
            </div>
            <?php
            break;
            
        case 'benefits':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Content:</label>
                <textarea name="blocks[<?php echo $index; ?>][content]"><?php echo esc_textarea($data['content'] ?? ''); ?></textarea>
            </div>
            <div class="block-field">
                <label>Button Text:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][button_text]" value="<?php echo esc_attr($data['button_text'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Button URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][button_url]" value="<?php echo esc_attr($data['button_url'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Background Image URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][background_image]" value="<?php echo esc_attr($data['background_image'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Benefits (one per line, format: Icon URL|Title|Description):</label>
                <textarea name="blocks[<?php echo $index; ?>][benefits]" placeholder="Icon URL|Title|Description"><?php echo esc_textarea($data['benefits'] ?? ''); ?></textarea>
            </div>
            <?php
            break;
            
        case 'location':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Content:</label>
                <textarea name="blocks[<?php echo $index; ?>][content]"><?php echo esc_textarea($data['content'] ?? ''); ?></textarea>
            </div>
            <div class="block-field">
                <label>Google Maps Embed Code:</label>
                <textarea name="blocks[<?php echo $index; ?>][map_embed]" placeholder="Paste Google Maps embed code here"><?php echo esc_textarea($data['map_embed'] ?? ''); ?></textarea>
            </div>
            <div class="block-field">
                <label>Location Items (one per line, format: Icon URL|Time|Name):</label>
                <textarea name="blocks[<?php echo $index; ?>][locations]" placeholder="Icon URL|Time|Name"><?php echo esc_textarea($data['locations'] ?? ''); ?></textarea>
            </div>
            <?php
            break;
            
        case 'apartments':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Description:</label>
                <textarea name="blocks[<?php echo $index; ?>][description]"><?php echo esc_textarea($data['description'] ?? ''); ?></textarea>
            </div>
            <div class="block-field">
                <label>Floor Plan Image URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][floor_plan]" value="<?php echo esc_attr($data['floor_plan'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Apartments (one per line, format: Number|Rooms|Area|Garden|Status|Price|Plan URL):</label>
                <textarea name="blocks[<?php echo $index; ?>][apartments]" placeholder="A1.1|4|55|245|available|Zapytaj o cenę|#"><?php echo esc_textarea($data['apartments'] ?? ''); ?></textarea>
            </div>
            <?php
            break;
            
        case 'visualizations':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Images (one per line):</label>
                <textarea name="blocks[<?php echo $index; ?>][images]" placeholder="Enter image URLs, one per line"><?php echo esc_textarea($data['images'] ?? ''); ?></textarea>
            </div>
            <?php
            break;
            
        case 'contact':
            ?>
            <div class="block-field">
                <label>Title:</label>
                <input type="text" name="blocks[<?php echo $index; ?>][title]" value="<?php echo esc_attr($data['title'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Company Logo URL:</label>
                <input type="url" name="blocks[<?php echo $index; ?>][company_logo]" value="<?php echo esc_attr($data['company_logo'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Address:</label>
                <textarea name="blocks[<?php echo $index; ?>][address]"><?php echo esc_textarea($data['address'] ?? ''); ?></textarea>
            </div>
            <div class="block-field">
                <label>Email:</label>
                <input type="email" name="blocks[<?php echo $index; ?>][email]" value="<?php echo esc_attr($data['email'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Phone:</label>
                <input type="tel" name="blocks[<?php echo $index; ?>][phone]" value="<?php echo esc_attr($data['phone'] ?? ''); ?>">
            </div>
            <div class="block-field">
                <label>Company Details:</label>
                <textarea name="blocks[<?php echo $index; ?>][company_details]"><?php echo esc_textarea($data['company_details'] ?? ''); ?></textarea>
            </div>
            <?php
            break;
    }
}

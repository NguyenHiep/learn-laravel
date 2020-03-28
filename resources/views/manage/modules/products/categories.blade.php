<div class="form-group">
    <div class="checkbox-list">
        @php
        $key = 'category_id.';
        $category_id = [];
        if (!empty($record->category_id)) {
            $category_id = convert_to_array($record->category_id);
        } else {
            $category_id = old(convert_input_name($key), []);
        }

        $html = '<label><input type="checkbox" name="' . convert_input_name($key) . '" value="0" id="id-category-0">Không xác định</label>'; $text = '&nbsp;&nbsp;&nbsp;&nbsp;';
        if (!empty($list_cate_all)) {
            foreach ($list_cate_all as $parent) {
                if ($parent->parent_id == 0) {
                    $checked = '';
                    if (in_array($parent->id, $category_id)) {
                        $checked = "checked='checked'";
                    }
                    $html .= '<label><input type="checkbox" name="' . convert_input_name($key) . '" value="' . $parent->id . '" id="id-category-' . $parent->id . '" ' . $checked . '>' . $parent->name . '</label>';
                    foreach ($list_cate_all as $child) {
                        $checked2 = '';
                        if (in_array($child->id, $category_id)) {
                            $checked2 = "checked='checked'";
                        }
                        if ($child->parent_id == $parent->id) {
                            $html .= '<label>' . $text . '<input type="checkbox" name="' . convert_input_name($key) . '" value="' . $child->id . '" id="id-category-' . $child->id . '" ' . $checked2 . '>' . $child->name . '</label>';
                            foreach ($list_cate_all as $child2) {
                                $checked3 = '';
                                if (in_array($child2->id, $category_id)) {
                                    $checked3 = "checked='checked'";
                                }
                                if ($child2->parent_id == $child->id) {
                                    $html .= '<label>' . $text . $text . '<input type="checkbox" name="' . convert_input_name($key) . '" value="' . $child2->id . '" id="id-category-' . $child2->id . '" ' . $checked3 . '>' . $child2->name . '</label>';
                                }
                            } // End loop level 3
                        }
                    } // End loop level 2
                }
            } // End loop level 1
        }
        echo $html;
        @endphp
    </div>
</div>
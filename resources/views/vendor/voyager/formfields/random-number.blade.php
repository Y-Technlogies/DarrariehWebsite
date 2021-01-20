<input type="number"
       class="form-control"
       name="{{ $row->field }}"
       data-name="{{ $row->display_name }}"
       @if($row->required == 1) required @endif
       step="any"
       placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
       value="{{ old($row->field, $dataTypeContent->{$row->field}) ?? old($row->field) ?? rand($options->random->min ?? 1000, $options->random->max ?? 9999)}}"
       readonly="readonly">
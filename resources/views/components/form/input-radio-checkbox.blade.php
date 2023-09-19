<?php 
    $is_required = null;
    $attr = null;

    if(isset($attributes)):
        if(is_array($attributes)):
            foreach($attributes as $indice => $attribute):
                $attr .= "{$indice}={$attribute} ";
                $is_required = $indice == 'required' ? '*' : null;
            endforeach;
        else:
            $attr = $attributes;
            $is_required = $attributes == 'required' ? '*' : null;
        endif;
    endif;
?>

<div class="mr-3 mt-3 relative">
    <div class="flex items-center pl-4 border border-secondary rounded">
        <input 
            id="<?php echo $name ?>" 
            type="<?php echo $type ?>" 
            value="<?php echo $value ?>"
            name="<?php echo $name ?>" 
            class="w-4 h-4"
            data-input-radio="<?php echo $name ?>"
            <?php echo $attr ?>
        >
        
        <label for="<?php echo $name ?>" class="w-full py-4 ml-2 text-sm font-medium text-secondary">
            <?php echo $label.$is_required ?>
        </label>
    </div>
    
    <span class='absolute right-0 bottom-0 validit'></span>
</div>


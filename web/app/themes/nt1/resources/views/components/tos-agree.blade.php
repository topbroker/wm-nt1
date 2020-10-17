<?php
$privacy_policy_link = get_field('privacy_policy_link', 'options');
?>

<label class="w-full max-w-300px text-12px flex">
    <input type="checkbox" class="flex-none mt-1">
    <span class="ml-2">
        {!! $privacy_policy_link !!}
    </span>
</label>
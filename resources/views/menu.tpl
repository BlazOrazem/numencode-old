<div class="container-fluid">
    <ul>
        {foreach $navigation as $nav}
            <li style="display: inline; padding: 0 20px;">
                <a href="{$nav.slug}">{$nav.title}</a>
            </li>
        {/foreach}
    </ul>
</div>
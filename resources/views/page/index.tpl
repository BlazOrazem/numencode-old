{extends file='index.tpl'}
{block name=body}
    <div class="container-fluid">

        <h1>{$item->title}</h1>

        {if $item->body}
            <section>
                {$item->body}
            </section>
        {/if}

        {if $item->contents}
            {foreach $item->contents as $content}
                <article>
                    <h2>{$content->title}</h2>
                    <section>{$content->body}</section>
                </article>
                {if $content->plugin}
                    <article>
                        <h3>{$content->plugin->title}</h3>
                        <section>{$content->plugin->content}</section>
                    </article>
                {/if}
            {/foreach}
        {/if}
    </div>
{/block}
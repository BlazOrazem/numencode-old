{extends file='index.tpl'}
{block name=body}
    <div class="container-fluid">
        <h1><em>TITLE</em>: {$item->title}</h1>
        <p><em>PUBLISHED AT</em>: {$item->published_at}</p>
        <section>
            <em>CONTENT</em>:<br>
            {$item->content}
        </section>
    </div>
{/block}
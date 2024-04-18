{extends file="main.tpl"}

{block name=content}

<section id="main" class="container">
  <div class="col-12">
    <section class="box">
      <h3>Oblicz swoją ratę</h3>
      <div class="row gtr-uniform gtr-50">
        <div class="col-6 col-12-mobilep">
            <form method="post" action="{$conf->action_root}calcCompute">
            <label for="id_kwota">Kwota: </label>
            <input id="id_kwota" type="text" name="kwota" /><br />
            <label for="id_raty">Ilość Lat: </label>
            <input id="id_raty" type="text" name="raty" /><br />
            <label for="id_procent">Oprocentowanie: </label>
            <input id="id_procent" type="text" name="procent" /><br />
            <input type="submit" value="Oblicz" />
          </form>
        </div>
        <div class="col-6 col-12-mobilep">
          {* wyświeltenie listy błędów, jeśli istnieją *} 
		{if $msgs->isError()} 
			<ol style="margin: 2em auto; padding: 1em auto; border-radius: 5px; background-color: #f88;">
			{foreach $msgs->getErrors() as $err }
			{strip}
                            <li>{$err}</li>
			{/strip}
			{/foreach}
			</ol>
                {/if}
		{if $msgs->isInfo()}
                        <ol style="margin: 2em auto; padding: 1em auto; border-radius: 5px; background-color: #8f8;">
                        {foreach $msgs->getInfos() as $inf }
                        {strip}
                                <li>{$inf}</li>
                        {/strip}
                        {/foreach}
                        </ol>
                {/if}
          {if (isset($result))}
          <div style="margin: 2em auto; padding: 2em auto; border-radius: 5px; background-color: #ff0;">
            Wynik: {round($result, 2)}
          </div>
          {/if}
        </div>
      </div>
    </section>
  </div>
</section>
{/block}
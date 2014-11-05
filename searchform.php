<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="Search the site..." name="s" id="s" onFocus="this.value=''"/>
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>
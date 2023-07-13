<div class="row hero--panel-one">
    <?php $panelOne = get_sub_field('panel_one'); ?>
    <div class="hero-top-header">
        <h1 class="heading-1 heading-1--hero font-default">
            <?php echo $panelOne['main']; ?><span><?php echo $panelOne['sub']; ?></span></h1>
        <p class="scroll-text"><?php echo $panelOne['scroll']; ?></p>
    </div>
</div>
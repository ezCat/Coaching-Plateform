<template>
<div>
    <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="large">
        <button class="menu-icon" type="button" data-toggle="example-menu"></button>
        <div class="title-bar-title">UCOACH</div>
    </div>

    <div class="top-bar" id="example-menu">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">UCOACH</li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <li><router-link to="/"><i class="fa fa-home"></i> HOME</router-link></li>
                <li><router-link to="/reminder"><i class="fa fa-bell"></i> REMINDER</router-link></li>
                <li><router-link to="/calendar"><i class="fa fa-calendar"></i> CALENDAR</router-link></li>
                <li><router-link to="/documents"><i class="fa fa-folder"></i> DOCUMENTS</router-link></li>
                <li><router-link to="/schedule"><i class="fa fa-calendar-o"></i> SCHEDULE</router-link></li>
                <li><router-link to="/injuries"><i class="fa fa-medkit"></i> INJURIES</router-link></li>
            </ul>
        </div>
    </div>
</div>
</template>
<style>
</style>
<script>
</script>

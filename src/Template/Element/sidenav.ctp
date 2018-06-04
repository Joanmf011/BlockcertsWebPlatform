<ul>
    <li class="menu-toggle-mobile">
        <div class='col-xs-4 col-md-4 col-lg-4 menu-logo-mobile <?=$closedMenu?>'><button id="menu-toggle-button" onclick="onClickMenuToggle()"><span id='toggle-icon-mobile' class='ti-align-justify'></span></button></div><div class='col-xs-8 col-md-8 col-lg-8 menu-text <?=$closedMenu?>'></div>
    </li>
</ul>
<nav class="side-nav <?=$closedMenu?>">
    <ul class="list-unstyled">
        <li class="menu-toggle">
            <div class='col-xs-4 col-md-4 col-lg-4 menu-logo <?=$closedMenu?>'><button id="menu-toggle-button" onclick="onClickMenuToggle()"><span id='toggle-icon' class='ti-align-justify'></span></button></div><div class='col-xs-8 col-md-8 col-lg-8 menu-text <?=$closedMenu?>'></div>
         </li>
         <div class="components-list">
             <li>
                <!--HOME-->
                <?=$this->Html->link("<div class='col-xs-4 col-md-4 col-lg-4 menu-logo ".$closedMenu."'><span class='ti-home'></span></div><div class='col-xs-8 col-md-8 col-lg-8 menu-text ".$closedMenu."'>Dashboard</div>",
                                    ["controller"=>"certificates", "action"=>"index"],
                                    ["escape"=>false, "class"=>$active['Pages']." menu-component ".$closedMenu])?>
             </li>
             <li>
                <!--CLIENTS-->
                <?=$this->Html->link("<div class='col-xs-4 col-md-4 col-lg-4 menu-logo ".$closedMenu."'><span class='ti-bar-chart-alt'></span></div><div class='col-xs-8 col-md-8 col-lg-8 menu-text ".$closedMenu."'>Reports</div>",
                                    ["controller"=>"certificates", "action"=>"index"],
                                    ["escape"=>false, "class"=>$active['Analytics']." menu-component ".$closedMenu])?>
             </li>
             <li>
                <!--WIDGETS-->
                <?=$this->Html->link("<div class='col-xs-4 col-md-4 col-lg-4 menu-logo ".$closedMenu."'><span class='ti-settings'></span></div><div class='col-xs-8 col-md-8 col-lg-8 menu-text ".$closedMenu."'>Settings</div>",
                                    ["controller"=>"certificates", "action"=>"index"],
                                    ["escape"=>false, "class"=>$active['Settings']." menu-component ".$closedMenu])?>
             </li>
         </div>
    </ul>
</nav> 
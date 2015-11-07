<section class="main has-sidebar">
<div class="page-title">
   <div class="title">
      <div class="middle">
         <h2> Dashboard </h2>
      </div>
   </div>
</div>

<div class="content">
      <div class="container">
         <div class="title-container">Visitor</div>
         <div class="graph-head">
            <div class="week-graph">
               <span> <a id="start"><?php echo $dateStart; ?></a> - <a id="end"><?php echo $dateEnd; ?></a> </span>
               <span class="float-right">
                  <a is="az-anchorajax"
                     action='<?php echo site_url("admin/dashboard/visitor/" . $prevVisitor); ?>'
                     method='click'
                     class="cursor-pointer"
                     callback-type = 'multiple-target'
                     id="prevGraph"
                  > Prev </a> |
                  <a is="az-anchorajax"
                     action='<?php echo site_url("admin/dashboard/visitor/" . $nextVisitor); ?>'
                     method='click'
                     class="cursor-pointer"
                     callback-type = 'multiple-target'
                     id="nextGraph"
                  > Next </a>
               </span>
            </div>
         </div>

         <az-chart column>
            <?php $i = 0; foreach($visitor as $data): ?>
            <az-bar barHeight="<?php echo $data->barHeight ?>" barLabel ="<?php echo $data->day; ?>" value="<?php echo $data->value; ?>" id="<?php echo 'bar' . $i; ?>"></az-bar>
            <?php $i++; endforeach; ?>
         </az-chart>
      </div>


      <!-- <div class="container">
         <div class="title-container">Recent Activity</div>
         <ol class="recent-activity">
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit lorem</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
         </ol>
      </div> -->

   </div>
</section>

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
                  <a onclick="requestGraph(&quot;1438737991&quot;)" id="prevGraph">Prev</a> | <a onclick="requestGraph(&quot;1439947591&quot;)" id="nextGraph">Next</a>
               </span>
            </div>
         </div>

         <az-chart column>
            <?php foreach($visitor as $data): ?>
            <bar height="<?php echo $data->barHeight ?>" value="<?php echo $data->value; ?>" _id="<?php echo $data->id; ?>"><?php echo $data->day; ?></bar>
            <?php endforeach; ?>
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

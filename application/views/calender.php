<div class="calendar-container">
   <form action= "">
      <select name ="month">
         <?php
            for ($i = 0; $i <= 12; $i++){
               echo "<option value = " . date('m') . "> " . date('F') . "</option>";
            }
         ?>
      </select>

      <input type = "number" min="1999" value="1999" name="Year"> </input>
      <button><i class="fa fa-search"> </i></button>
   </form>

   <ul class="calendar-ul">
      <?php
         $i = 1; foreach ($event as $key => $value):

         $date = date_create_from_format('Y-m-d' , $year . '-' . $month . '-' .$key);

         if ($i == 1):
      ?>
      <li class="main-calendar">
        <ul>
      <?php endif; ?>

            <li>
               <div class="isi-calender">
                  <div class="calender-date"> <?php echo $key; ?> | <?php echo date_format($date, 'l'); ?> </div>
                  <article>
                     <ul>

                        <?php foreach ($value as $data): ?>
                        <ol>
                           <a is="az-anchorajax"
                              href = '<?php echo $urlview . '/' . $data->arURL; ?>'
                              target="_blank"
                              action='<?php echo site_url('music/show/' . $data->arId);  ?>'
                              method='click'
                           > <?php echo $data->arTitle; ?> </a>
                        </ol>
                        <?php endforeach; ?>

                     </ul>
                  </article>
               </div>

               <?php
                  if (count($value) > 0):
                     foreach ($value as $data):
               ?>
                  <?php if (!empty($data->arPict)): ?>
                     <img src="<?php echo $data->arPict; ?>">
                  <?php endif; ?>
               <?php
                     endforeach;
                  else:
               ?>
               <img src="<?php echo base_url('public/img/music5.jpg');?>">
               <?php endif; ?>
            </li>

      <?php if ($i >= 4): $i=0; ?>
         </ul>
      </li>
   <?php endif; ?>

      <?php $i++; endforeach; ?>
   </ul>

</div>

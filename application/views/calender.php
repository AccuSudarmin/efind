<div class="calendar-container">
   <form is='az-form'
      action = "<?php echo $urlaction; ?>"
      method = "post">
      <select name ="month">
         <?php
            for ($i = 0; $i <= 12; $i++){
               $date = date_create_from_format('n' , $i);
               $optionMonthm = date_format($date, 'm');
               $optionMonthF = date_format($date, 'F');
               if ($optionMonthm == $month ) echo "<option value = " . $optionMonthm . " selected> " . $optionMonthF . "</option>";
               else echo "<option value = " . $optionMonthm . "> " . $optionMonthF . "</option>";
            }
         ?>
      </select>

      <input type = "number" min="1999" value="<?php echo $year; ?>" name="year"> </input>
      <button><i class="fa fa-search"> </i></button>
   </form>

   <ul class="calendar-ul" id="list-event">
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
                  <?php if(date_format($date, 'l') == 'Saturday' || date_format($date, 'l') == 'Sunday'): ?>
                  <div class="calender-date tanggal-merah"> <?php echo $key; ?> | <?php echo date_format($date, 'l'); ?> </div>
                  <?php else: ?>
                  <div class="calender-date"> <?php echo $key; ?> | <?php echo date_format($date, 'l'); ?> </div>
                  <?php endif; ?>
                  <article>
                     <ul>

                        <?php foreach ($value as $data): ?>
                        <ol>
                           <a is="az-anchorajax"
                              href = '<?php echo $urlview . '/' . $data->arURL; ?>'
                              action='<?php echo site_url('music/show/' . $data->arURL);  ?>'
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

<section class="main has-sidebar">
<div class="page-title">
   <div class="login-icon image-left title">
      <div class="middle">
         <h3> Dashboard </h3>
         <h6> Welcome admin </h6>
      </div>
   </div>
</div>

<div class="content">
      <div class="container">
         <div class="title-container">Visitor</div>
         <div class="graph-head">
            <div class="week-graph">
               <span> <a id="start">06 Aug 2015</a> - <a id="end">12 Aug 2015</a> </span>
               <span class="float-right">
                  <a onclick="requestGraph(&quot;1438737991&quot;)" id="prevGraph">Prev</a> | <a onclick="requestGraph(&quot;1439947591&quot;)" id="nextGraph">Next</a>
               </span>
            </div>
         </div>

         <az-chart column>
            <bar value="20">Sun</bar>
            <bar value="40">Mon</bar>
            <bar value="20">Tue</bar>
            <bar value="80">Wed</bar>
            <bar value="70">Thu</bar>
            <bar value="20">Fri</bar>
            <bar value="100">Sat</bar>
            <bar value="20">Sun</bar>
            <bar value="40">Mon</bar>
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

@extends('dashboard.master.master')

@section('title')
  Home
@endsection

@section('home_aktif')
    active
@endsection

@section('page_aktif')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('isi')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Kripik Terjual</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px"></sup></h3>

              <p>Stok Kripik</p>
            </div>
            <div class="icon">
              <i class="fas fa-bacon"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Stok Singkong</p>
            </div>
            <div class="icon">
              <i class="fas fa-cubes"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Stok Plastik</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-bag"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- interactive chart -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Grafik Stok
              </h3>
            </div>
            <div class="card-body">
              <div id="interactive" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js_bawah')
<!-- FLOT CHARTS -->
<script src="{{ asset('js/Template/jquery.flot.js') }}"></script>
<script>
    $(function () {
      /*
       * Flot Interactive Chart
       * -----------------------
       */
      // We use an inline data source in the example, usually data would
      // be fetched from a server
      var data        = [],
          totalPoints = 100
  
      function getRandomData() {
  
        if (data.length > 0) {
          data = data.slice(1)
        }
  
        // Do a random walk
        while (data.length < totalPoints) {
  
          var prev = data.length > 0 ? data[data.length - 1] : 50,
              y    = prev + Math.random() * 10 - 5
  
          if (y < 0) {
            y = 0
          } else if (y > 100) {
            y = 100
          }
  
          data.push(y)
        }
  
        // Zip the generated y values with the x values
        var res = []
        for (var i = 0; i < data.length; ++i) {
          res.push([i, data[i]])
        }
  
        return res
      }
  
      var interactive_plot = $.plot('#interactive', [
          {
            data: getRandomData(),
          }
        ],
        {
          grid: {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
          },
          series: {
            color: '#3c8dbc',
            lines: {
              lineWidth: 2,
              show: true,
              fill: true,
            },
          },
          yaxis: {
            min: 0,
            max: 100,
            show: true
          },
          xaxis: {
            show: true
          }
        }
      )
  
      var updateInterval = 500 //Fetch data ever x milliseconds
      var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
      function update() {
  
        interactive_plot.setData([getRandomData()])
  
        // Since the axes don't change, we don't need to call plot.setupGrid()
        interactive_plot.draw()
        if (realtime === 'on') {
          setTimeout(update, updateInterval)
        }
      }
  
      //INITIALIZE REALTIME DATA FETCHING
      if (realtime === 'on') {
        update()
      }
      //REALTIME TOGGLE
      $('#realtime .btn').click(function () {
        if ($(this).data('toggle') === 'on') {
          realtime = 'on'
        }
        else {
          realtime = 'off'
        }
        update()
      })
      /*
       * END INTERACTIVE CHART
       */
    })
  
    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }
  </script>
@endsection
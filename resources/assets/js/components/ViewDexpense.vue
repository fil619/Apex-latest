<template>
  <div class="" style="overflow-x:auto;">
  <table class="table table-stripe table-condensed">
  <thead>
    <tr>
      <th>#</th>
      <th>Type</th>
      <th>Apr</th>
      <th>May</th>
      <th>Jun</th>
      <th>Jul</th>
      <th>Aug</th>
      <th>Sep</th>
      <th>Oct</th>
      <th>Nov</th>
      <th>Dec</th>
      <th>Jan</th>
      <th>Feb</th>
      <th>Mar</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(ledger , index ) in dledgers">
      <td v-if="ledger" >{{index+1}}</td>
      <td class="type">{{ledger.ledger}}</td>
      <td>{{sumApr[index]}}</td>
      <td>{{sumMay[index]}}</td>
      <td>{{sumJun[index]}}</td>
      <td>{{sumJul[index]}}</td>
      <td>{{sumAug[index]}}</td>
      <td>{{sumSep[index]}}</td>
      <td>{{sumOct[index]}}</td>
      <td>{{sumNov[index]}}</td>
      <td>{{sumDec[index]}}</td>
      <td>{{sumJan[index]}}</td>
      <td>{{sumFeb[index]}}</td>
      <td>{{sumMar[index]}}</td>
      <td  style="background-color:#e0e0e0 ; font-size: 15px; ">{{Total[index]}}</td>
    </tr>
    <tr style="background-color:#424242 ; color:white ">
      <td colspan="2"></td>
      <td>{{AprSum}}</td>
      <td>{{MaySum}}</td>
      <td>{{JunSum}}</td>
      <td>{{JulSum}}</td>
      <td>{{AugSum}}</td>
      <td>{{SepSum}}</td>
      <td>{{OctSum}}</td>
      <td>{{NovSum}}</td>
      <td>{{DecSum}}</td>
      <td>{{JanSum}}</td>
      <td>{{FebSum}}</td>
      <td>{{MarSum}}</td>
      <td>{{yearTotal}}</td>
    </tr>
  </tbody>
</table>
</div>
</template>

<script>
export default {
  data(){
      return {
          dledgers:{ledger:'', id: ''},
          sumJan:{},
          sumFeb:{},
          sumMar:{},
          sumApr:{},
          sumMay:{},
          sumJun:{},
          sumJul:{},
          sumAug:{},
          sumSep:{},
          sumOct:{},
          sumNov:{},
          sumDec:{},
          Total:{},
          yearTotal:''
              }
        },
        mounted()
        {
          this.getdledgers();
          this.getSum();
          this.getTotal();
        },
        computed: {
          AprSum()
          {
            var AprTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumApr.length; i++) {
              AprTotal = parseInt(this.sumApr[i]);
              Total = Total + AprTotal;
            }
            return Total;
          },
          MaySum()
          {
            var MayTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumMay.length; i++) {
              MayTotal = parseInt(this.sumMay[i]);
              Total = Total + MayTotal;
            }
            return Total;
          },
          JunSum()
          {
            var JunTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumJun.length; i++) {
              JunTotal = parseInt(this.sumJun[i]);
              Total = Total + JunTotal;
            }
            return Total;
          },
          JulSum()
          {
            var JulTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumJul.length; i++) {
              JulTotal = parseInt(this.sumJul[i]);
              Total = Total + JulTotal;
            }
            return Total;
          },
          AugSum()
          {
            var AugTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumAug.length; i++) {
              AugTotal = parseInt(this.sumAug[i]);
              Total = Total + AugTotal;
            }
            return Total;
          },
          SepSum()
          {
            var SepTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumSep.length; i++) {
              SepTotal = parseInt(this.sumSep[i]);
              Total = Total + SepTotal;
            }
            return Total;
          },
          OctSum()
          {
            var OctTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumOct.length; i++) {
              OctTotal = parseInt(this.sumOct[i]);
              Total = Total + OctTotal;
            }
            return Total;
          },
          NovSum()
          {
            var NovTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumNov.length; i++) {
              NovTotal = parseInt(this.sumNov[i]);
              Total = Total + NovTotal;
            }
            return Total;
          },
          DecSum()
          {
            var DecTotal ;
            var Total=0 ;
            for (var i = 0; i < this.sumDec.length; i++) {
              DecTotal = parseInt(this.sumDec[i]);
              Total = Total + DecTotal;
            }
            return Total;
          },
         JanSum()
         {
           var JanTotal ;
           var Total=0 ;
           for (var i = 0; i < this.sumJan.length; i++) {
             JanTotal = parseInt(this.sumJan[i]);
             Total = Total + JanTotal;
           }
           return Total;
         },
         FebSum()
         {
           var FebTotal ;
           var Total=0 ;
           for (var i = 0; i < this.sumFeb.length; i++) {
             FebTotal = parseInt(this.sumFeb[i]);
             Total = Total + FebTotal;
           }
           return Total;
         },
         MarSum()
         {
           var MarTotal ;
           var Total=0 ;
           for (var i = 0; i < this.sumMar.length; i++) {
             MarTotal = parseInt(this.sumMar[i]);
             Total = Total + MarTotal;
           }
           return Total;
         }
       },
        methods:
        {
          getdledgers()
          {
            axios.get('/directledger')
                .then(response => {
                    this.dledgers = response.data.dledger;
                });
          },
          getSum()
          {
            axios.get('/direct/sum',{
              params: {
                      month: '04'
                      }
            })
            .then(response => {
            this.sumApr = response.data ;
          });

          axios.get('/direct/sum',{
            params: {
                    month: '05'
                    }
          })
          .then(response => {
          this.sumMay = response.data ;
        });
        axios.get('/direct/sum',{
          params: {
                  month: '06'
                  }
        })
        .then(response => {
        this.sumJun = response.data ;
      });
      axios.get('/direct/sum',{
        params: {
                month: '07'
                }
      })
      .then(response => {
      this.sumJul = response.data ;
      });
      axios.get('/direct/sum',{
        params: {
                month: '08'
                }
      })
      .then(response => {
      this.sumAug = response.data ;
      });
      axios.get('/direct/sum',{
        params: {
                month: '09'
                }
      })
      .then(response => {
      this.sumSep = response.data ;
      });
      axios.get('/direct/sum',{
        params: {
                month: '010'
                }
      })
      .then(response => {
      this.sumOct = response.data ;
      });
      axios.get('/direct/sum',{
        params: {
                month: '011'
                }
      })
      .then(response => {
      this.sumNov = response.data ;
      });
      axios.get('/direct/sum',{
        params: {
                month: '12'
                }
      })
      .then(response => {
      this.sumDec = response.data ;
      });
            axios.get('/direct/sum',{
              params: {
                      month: '01'
                      }
            })
            .then(response => {
            this.sumJan = response.data ;
          });

          axios.get('/direct/sum',{
            params: {
                    month: '02'
                    }
          })
          .then(response => {
          this.sumFeb = response.data ;
        });

        axios.get('/direct/sum',{
          params: {
                  month: '03'
                  }
        })
        .then(response => {
        this.sumMar = response.data ;
      });
    },
    getTotal()
    {
      axios.get('/direct/total')
      .then(response => {
        this.yearTotal = 0;
      this.Total = response.data ;
      for (var i = 0; i < this.Total.length; i++) {
        var integer = parseInt(this.Total[i]);
        this.yearTotal = this.yearTotal + integer;
      }
    });
    }
        }
}
</script>
<style media="screen" scoped>
  table
  {
    font-size: 15px;
    font-weight: bold;
  }
  td
  {
    color: black;
    border: 1px solid ;
    width: 70px;
    height: 10px;
  }
  td.type
  {
    width: 200px !important;
  }
  th{
    background-color: black;
    color: white;
  }

</style>

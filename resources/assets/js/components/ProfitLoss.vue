<template lang="html">
  <div class="container" @click.ctrl="sample">
    <div class="row">
      <div class="col-md-6">

        <table class="table table-condensed">
          <tbody>
            <tr >
              <th colspan="2" style="text-align: center;">Liabilities as at {{indirectcal}}</th>
            </tr>
            <tr id='start'>
              <th @click="togglediv" >Opening Balance</th>
              <td>{{liabilities.capital}}</td>
            </tr>
            <tr>
              <div id="myDIV" style="display:none">
                <ul v-for="(capital , index ) in capital">
                  <li>{{capital.name}} - {{capital.amount}}</li>
                </ul>
              </div>
            </tr>
            <tr>
              <th @click="toggleloan">Direct Expenses</th>
              <td>{{liabilities.Loan}}</td>
            </tr>
            <tr>
              <div id="loandiv" style="display:none">
                <ul v-for="(loan , index ) in loan">
                  <li>{{loan.name}} - {{loan.amount}}</li>
                </ul>
              </div>
            </tr>
            <tr>
              <th @click="toggleCur" >Inirect Expenses</th>
              <td>{{liabilities.Current}}</td>
            </tr>
            <tr>
              <div id="curdiv" style="display:none">
                <ul v-for="(current , index ) in current">
                  <li>{{current.name}} - {{current.amount}}</li>
                </ul>
              </div>
            </tr>
          </tbody>
        </table>
        <div class="absolute"><p style="text-align:left;">Total:<span style="float:right;font-weight: bold"> {{liabilities.Liabilities}}</span></p></div>
      </div>
      <div class="col-md-6" @keydown.esc="selected" >

      </div>
    </div>

  </div>
</template>

<script>
export default
{
  data(){
      return {
          liabilities: {
            Liabilities:'',
            capital:'',
            Loan:'',
            Current:''
          },
          capital: {
          name:'',
          amount:''
          },
          loan: {
          name:'',
          amount:''
          },
          current: {
          name:'',
          amount:''
          },
          date:{
            year:'',
            month:'',
            day:'',
          },
          indirect:{
            type:'',
            amount:'',
          },
          ledger:{
            type:''
          },
      }
  },
  mounted()
  {
    this.getIndirect();
      this.liabdetail();

  },
    computed:
    {

    },
  methods:
  {
    liabdetail()
    {
      axios.get('Liabilities/getliab')
          .then(response => {
            this.capital = response.data.capital;
            this.loan = response.data.Loan;
            this.current = response.data.Current;
          });
    },
    getIndirect()
    {
      axios.get('/indirect').then(response => {this.indirect = response.data});
      axios.get('/ledger').then(response => {this.ledger = response.data});

    },

    togglediv()
    {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";

        }
    },
    toggleloan()
    {
        var x = document.getElementById("loandiv");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";

        }
    },
    toggleCur()
    {
        var x = document.getElementById("curdiv");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";

        }
    }
  }
}
</script>

<style lang="css" scoped>
.col-md-6
{
  height: 80vh;
  border: 2px solid black;
}
tr
{
  font-size: 15px;
  color:black;
}
div.absolute {
  position: absolute;
  width: 95%;
  bottom: 0px;
  border-top:  1px solid black;
  font-size: 25px;
  color:black;
}
th:hover
{
  cursor: pointer;
}
li{
  font-size: 12px;

}
</style>

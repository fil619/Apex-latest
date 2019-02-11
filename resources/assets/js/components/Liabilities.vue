<template lang="html">

    <div class="container" >

      <ul class="nav nav-pills">
        <li><a data-toggle="pill" href="#home" >Capital Accounts</a></li>
        <li><a data-toggle="pill" href="#menu1" ref="lo">Loans</a></li>
        <li><a data-toggle="pill" href="#menu2">Current Liabilities</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade">
          <h4>Capital Accounts</h4>

          <div class="form-group">
              <label for="title" style="color:black">Name:</label>
              <input type="text" name="name" id="name" placeholder="Enter Name" ref="capitalname" class="form-control" @keyup.enter="$refs.capitalamount.focus" v-model="capital.name" autocomplete="off" >
          </div>
          <div class="form-group">
              <label for="title" style="color:black" >Amount:</label>
              <input type="number" name="amount" id="amount" placeholder="Enter Amount" ref="capitalamount" class="form-control" @keyup.esc="$refs.capitalname.focus" v-model="capital.amount" @keyup.enter="createcapital" autocomplete="off">
          </div>


<button type="button" name="button" @click="createcapital">Submit</button>
<br>
<br>
<br>
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Loans</h3>
          <div class="form-group">
              <label for="title" style="color:black">Name:</label>
              <input type="text" name="name" id="name" placeholder="Enter Name" ref="loanname" class="form-control" @keyup.enter="$refs.loanamount.focus" v-model="loan.name" autocomplete="off" >
          </div>
          <div class="form-group">
              <label for="title" style="color:black" >Amount:</label>
              <input type="number" name="amount" id="amount" placeholder="Enter Amount" ref="loanamount" class="form-control" @keyup.esc="$refs.loanname.focus" v-model="loan.amount" @keyup.enter="createcapital" autocomplete="off">
          </div>
<button type="button" name="button" @click="createloan">Submit</button>
<br>
<br>
<br>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Current Liabilities</h3>
      
          <div class="form-group">
              <label for="title" style="color:black">Name:</label>
              <input type="text" name="name" id="name" placeholder="Enter Name" ref="liabilitiesname" class="form-control" @keyup.enter="$refs.liabilitiesamount.focus" v-model="liabilities.name" autocomplete="off" >
          </div>
          <div class="form-group">
              <label for="title" style="color:black" >Amount:</label>
              <input type="number" name="amount" id="amount" placeholder="Enter Amount" ref="liabilitiesamount" class="form-control" @keyup.esc="$refs.liabilitiesname.focus" v-model="liabilities.amount" @keyup.enter="createcapital" autocomplete="off">
          </div>
<button type="button" name="button" @click="createcurliab">Submit</button>
<br>
<br>
<br>
        </div>
      </div>
    </div>

</template>

<script>
export default {
  data(){
      return {
          capital: {
            name:'',
            amount:''
          },
          loan: {
            name:'',
            amount:''
          },
          liabilities: {
            name:'',
            amount:''
          }
      }
  },
      methods:{
        createcapital()
        {
          axios.post('/Liabilities', {
            name: this.capital.name,
            amount: this.capital.amount,
            type: 'Capital Account'
          })
              .then(response => {
              this.capital.name = '';
              this.capital.amount = '';
              })
        },
        createloan()
        {
          axios.post('/Liabilities', {
            name: this.loan.name,
            amount: this.loan.amount,
            type: 'Loan'
          })
              .then(response => {
              this.loan.name = '';
              this.loan.amount = '';
              })
        },
        createcurliab()
        {
          axios.post('/Liabilities', {
            name: this.liabilities.name,
            amount: this.liabilities.amount,
            type: 'Current Liabilities'
          })
              .then(response => {
              this.liabilities.name = '';
              this.liabilities.amount = '';
              })
        }

      }
}
</script>

<style lang="css" scoped>
a
{
font-size: 15px;
width: 30vh;
color: black;
}
.container
{
  font-size: 15px;
}
.active
{
  background: white !important;
  border: 1px solid black;
}
#home
{
padding: 0px 50px 0px 50px;
}
#menu1
{
padding: 0px 50px 0px 50px;
}
#menu2
{
padding: 0px 50px 0px 50px;
}
</style>

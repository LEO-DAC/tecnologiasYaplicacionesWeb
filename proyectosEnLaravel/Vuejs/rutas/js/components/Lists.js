const Lists =  {
    name: "Lists",
    template:`<div>
                    <ul>
                        <li v-for="persona in nombres">{{persona}}</li>
                   </ul>
              </div>`,
              data: function(){
                  return{
                    nombres:["pepe","juan","pedro"]
                  } 
              }
}
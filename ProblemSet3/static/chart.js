     $("button#get_fans").click(function() {
      var table1_items = [];
      var i = 0;
      var airtable_read_endpoint =
      "https://api.airtable.com/v0/appSmZnXtQ42iMBXl/Json?api_key=key3P4gTMtrDY1ylx";
      var table1_dataSet = [];
      $.getJSON(airtable_read_endpoint, function(result) {
             $.each(result.records, function(key,value) {
                 table1_items = [];
                     table1_items.push(value.fields.Companies);
                     table1_items.push(value.fields.Weibo_Fans);
                     table1_dataSet.push(table1_items);
                     console.log(table1_items);
              }); // end .each
              console.log(table1_dataSet);

             var chart = c3.generate({
                  data: {
                      columns: table1_dataSet,
                      type : 'bar'
                  },
                  axis: {
                      x: {
                          label: '团队名称'
                      },
                      y: {
                          label: '微博粉丝数'
                      },
                  }
              });
            }); // end .getJSON
         }); // end button

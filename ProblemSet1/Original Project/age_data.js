     $("button#get_age").click(function() {
       var table3_items = [];
       var i = 0;
       var airtable_read_endpoint = "https://api.airtable.com/v0/appSmZnXtQ42iMBXl/Json?api_key=key3P4gTMtrDY1ylx";
       var table3_dataSet = [];
       $.getJSON(airtable_read_endpoint, function(result) {
              $.each(result.records, function(key,value) {
                  table3_items = [];
                      table3_items.push(value.fields.Companies);
                      table3_items.push('<td><img src="' + value.fields.Logos + '" style="width: 90px;"/></td>');
                      table3_items.push(value.fields.Average_age);
                      table3_dataSet.push(table3_items);
               }); // end .each

            $('#table3').DataTable( {
                data: table3_dataSet,
                retrieve: true,
                columns: [
                    { title: "团队名称",
                      defaultContent:""},
                    { title: "团队标识",
                      defaultContent:""},
                    { title: "平均年龄",
                      defaultContent:""},
                ]
            } );
       }); // end .getJSON

       var table4_items = [];
       var i = 0;
       var airtable_read_endpoint =
       "https://api.airtable.com/v0/appSmZnXtQ42iMBXl/Json?api_key=key3P4gTMtrDY1ylx";
       var table4_dataSet = [];
       $.getJSON(airtable_read_endpoint, function(result) {
              $.each(result.records, function(key,value) {
                  table4_items = [];
                      table4_items.push(value.fields.Companies);
                      table4_items.push(value.fields.Average_age);
                      table4_dataSet.push(table4_items);
                      console.log(table4_items);
               }); // end .each
               console.log(table4_dataSet);

              var chart = c3.generate({
                   data: {
                       columns: table4_dataSet,
                       type : 'bar'
                   },
                   axis: {
                       x: {
                           label: '团队名称'
                       },
                       y: {
                           label: '平均年龄'
                       },
                   }
               });

        }); // end .getJSON
     }); // end button

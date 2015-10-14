

function getData(){
    jQuery.get('https://www.hydrovu.com/api/company/5300312663392256/report?q=%7B%22resolution%22:10,%22timeSlice%22:%5B%7B%22value%22:1442058240,%22op%22:%22%3E=%22%7D,%7B%22value%22:1442304000,%22op%22:%22%3C=%22%7D%5D,%22units%22:%7B%22baro%22:%22psi%22,%22temperature%22:%22celsius%22,%22level%22:%22meter%22,%22pressure%22:%22psi%22%7D,%22active%22:true,%22gpsBounds%22:%7B%22northeast%22:%7B%22latitude%22:62.02586767519265,%22longitude%22:-52.332235999999966%7D,%22southwest%22:%7B%22latitude%22:9.284751635846062,%22longitude%22:-157.80098599999997%7D%7D,%22pageObject%22:%7B%22size%22:1000,%22start%22:0%7D,%22locationIds%22:%5B4738711174512640,5416931037282304,6304557567049728,6311491657531392%5D%7D&timeRange=%7B%22from%22:1442156160,%22to%22:1442242560%7D&authorization=kyMXwE5vW%2B9YJLVsG3fQEvcQltqSY5ejhilbCXDM8%2BOoWuRK1wWMYRYQhiPaog45Bmd1b6Y%2BC8aUJu%2FPPjMzM%2BxspFWfCqqsjtZ3YDkvOhb%2Fn1s6lN5UBtpeYyOS34aJPyGvzjO%2BsmYoIEdryn4AOA%3D%3D', function(res){
        var data = JSON.parse(JSON.stringify(res, null, 2)).responseText;
        //var dataString = data[0].responseText;
        console.log(data);
    });
    
}

/*
*       File:   calendarGrid.js
*       Dated:  24-12-2012
*       Author: Shankar
*/
(function($){
        $.fn.calendarGrid = function(options){
        
                var defaults = {
                        calendarClass: '.calendar',
                        calendarCell: '.calendar td',
                        currentView : 'month',
                        monthViewWeeks: '5',
                        monthViewdays: '7',
                        eventFrequency:'1',
                        hoverActions: false,
                        clickActions: false,
                        debugMode: false,
                        showHolidays: true,
                        weekStart: '1',
                        sAjaxSource: ''
                };
                
                var calendarGrid = jQuery.extend(defaults, options);
                
                function _drawCalendar() {
                        var url = calendarGrid.sAjaxSource;
                        var htmlText = '';
                        var cellText = '';
                        var rowSpan;
                        $.getJSON( url,function(data){
                                for (var i in data.markers) {
                                        
                                        if(data.markers[i].meta == 'row-start') {
                                                htmlText +='<tr>';
                                        }
                                        
                                        if(data.markers[i].type == 'dates'){
                                                cellText = data.markers[i].calDate.day + " - " + data.markers[i].calDate.month + " - "+ data.markers[i].calDate.year;                                                                           
                                        } else {
                                                cellText = '';                          
                                        }
                                        
                                        htmlText += "<td class='"+ data.markers[i].type +"' rowspan='"+ rowSpan +"'>"+ cellText +"</td>";
                                        
                                        if(data.markers[i].meta == 'row-end') {
                                                htmlText += '</tr>';                                    
                                        }       
                                                                
                            }
                                $(calendarGrid.calendarClass).find('tbody').html(htmlText);
                        }); 
                }
                
                function _debug() {
                        if(calendarGrid.debugMode==true) {
                                console.log('Calendar Grid initiated');
                                console.log('Current Class: '+calendarGrid.calendarClass);
                                console.log('Current View: '+calendarGrid.currentView);
                                console.log('Week Occurance: '+calendarGrid.monthViewWeeks);
                                console.log('Days Covered: '+calendarGrid.monthViewdays);
                                console.log('Event Frequency: '+calendarGrid.eventFrequency);
                                console.log('Hover Actions: '+calendarGrid.hoverActions);
                                console.log('Click Actions: '+calendarGrid.clickActions);
                                console.log('Week Start: '+calendarGrid.weekStart);
                                console.log('Show Holidays: '+calendarGrid.showHolidays);
                        } 
                }
                
                function _hoverActions() {
                        if(calendarGrid.hoverActions == true){
                                $(calendarGrid.calendarCell).hover(function() {
                                        $(calendarGrid.calendarClass).addClass('calendar-hover');
                                        var col = $(this).parent().children().index($(this));
                                        var row = $(this).parent().parent().children().index($(this).parent());
                                        var className = $(this).attr('class');
                                        console.log(row + ', ' + col + '| '+ className+' | '+$(this).text());
                                });
                        }       
                }
                
                function _markWeekStart() {
                        if(calendarGrid.showHolidays == true){
                                if($(this).attr('class') == "no-events"){
                                        $('.calendar tr td:nth-child('+calendarGrid.weekStart+')').not('.dates').addClass('holiday');
                                }
                        }
                }
                
                function _clickActions() {
                        if(calendarGrid.clickActions == true) {
                                $(calendarGrid.calendarCell).click(function() {
                                        var col = $(this).parent().children().index($(this));
                                        var row = $(this).parent().parent().children().index($(this).parent());
                                        console.log(row + ', ' + col + ' | '+$(this).text());
                                });
                        }
                }
                
                return this.each(function() {
                        _debug();
                        _drawCalendar();
                        _hoverActions();
                        _clickActions();                        
                        _markWeekStart();
                });
                
        };      
})(jQuery);

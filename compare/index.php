<?php

/*
    Template Name: Compare finally123
 */

 get_header();?>

            <div class="row">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label>Type</label>
                        <select id="type" class="form-control" onchange="showCategories(this.value, 'category')">
                            <option></option>
                            <option value="Futures">期貨</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="category" class="form-control" onchange="showNames('type', this.value, 'names')">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <select id="names" class="form-control" onchange="showTimes('type', 'category', this.value, 'times')">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <select id="times" class="form-control" onchange="compare()">
                        </select>
                    </div>
                </form>
            </div>
            <div class="col">
                <form>
                    <div class="form-group">
                        <label>Type</label>
                        <select id="type2" class="form-control" onchange="showCategories(this.value, 'category2')">
                            <option></option>
                            <option value="Futures">期貨</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="category2" class="form-control" onchange="showNames('type2', this.value, 'names2')">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <select id="names2" class="form-control" onchange="showTimes('type2', 'category2', this.value, 'times2')">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <select id="times2" class="form-control" onchange="compare()">
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <label>Compare</label>
            <table id="compareTable" class="table table-bordered">
            </table>

            <div id="verTable">
            </div>
        </div>
        

        <script>
        const showCategories = (value, next) => {
            $.ajax({
                url: "<?php echo get_template_directory_uri(); ?>/compare/post.php",
                dataType: "json",
                type: "POST",
                data: {
                    type: value
                },
                error: (error) => {
                    console.log("Error: " + error);
                },
                success: (data) => {
                    if (data) {
                        $("#" + next).append($("<option></option>").attr("value", "").text(""));

                        for (let key in data) {
                            $("#" + next).append($("<option></option>").attr("value", data[key].future_category_id).text(data[key].name));
                        }
                    }
                },
                complete: () => {
                },
                beforeSend: () => {
                }
            })
        }

        const showNames = (prev, valueC, next) => {
            let valueT = $("#" + prev).val();

            $.ajax({
                url: "<?php echo get_template_directory_uri(); ?>/compare/post.php",
                dataType: "json",
                type: "POST",
                data: {
                    type: valueT,
                    category: valueC
                },
                error: (error) => {
                    console.log("Error: " + error);
                },
                success: (data) => {
                    if (data) {
                        $("#" + next).append($("<option></option>").attr("value", "").text(""));

                        for (let key in data) {
                            $("#" + next).append($("<option></option>").attr("value", data[key].future_id).text(data[key].name));
                        }
                    }
                },
                complete: () => {
                },
                beforeSend: () => {
                }
            })
        }

        const showTimes = (prev1, prev2, valueN, next) => {
            let valueT = $("#" + prev1).val();
            let valueC = $("#" + prev2).val();

            $.ajax({
                url: "<?php echo get_template_directory_uri(); ?>/compare/post.php",
                dataType: "json",
                type: "POST",
                data: {
                    type: valueT,
                    category: valueC,
                    name: valueN
                },
                error: (error) => {
                    console.log("Error: " + error);
                },
                success: (data) => {
                    if (data) {
                        $("#" + next).append($("<option></option>").attr("value", "").text(""));

                        for (let key in data) {
                            $("#" + next).append($("<option></option>").attr("value", data[key].futures_data_id).text(data[key].time));
                        }
                    }
                },
                complete: () => {
                },
                beforeSend: () => {
                }
            })
        }

        const compare = () => {
            let valuet1 = $("#times").val();
            let valuet2 = $("#times2").val();

            if (valuet1 && valuet2) {

                $.ajax({
                    url: "<?php echo get_template_directory_uri(); ?>/compare/post.php",
                    dataType: "json",
                    type: "POST",
                    data: {
                        dataId1: valuet1,
                        dataId2: valuet2
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        console.log(textStatus, errorThrown);
                    },
                    success: (data) => {
                        console.log(data);
                        $("#compareTable").empty();
                        //buildHtmlTable(data, '#compareTable');

                        buildVerTable(data, '#verTable');
                    },
                    complete: () => {
                    },
                    beforeSend: () => {
                    }
                })
            }
        }

        //table from : https://stackoverflow.com/questions/5180382/convert-json-data-to-a-html-table

        function buildHtmlTable(myList, selector) {
            var columns = addAllColumnHeaders(myList, selector);

            for (var i = 0; i < myList.length; i++) {
                var row$ = $('<tr/>');
                for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                    var cellValue = myList[i][columns[colIndex]];
                    if (cellValue == null) cellValue = "";
                    row$.append($('<td/>').html(cellValue));
                }
                $(selector).append(row$);
            }
        }

        function addAllColumnHeaders(myList, selector) {
            var columnSet = [];
            var headerTr$ = $('<tr/>');

            for (var i = 0; i < myList.length; i++) {
                var rowHash = myList[i];
                for (var key in rowHash) {
                    if ($.inArray(key, columnSet) == -1) {
                        columnSet.push(key);
                        headerTr$.append($('<th/>').html(key));
                    }
                }
            }
            $(selector).append(headerTr$);

            return columnSet;
        }

        const buildVerTable = (myList, selector) => {
            let output = "";
            let rowLen = -1;
            let max;

            for (let i in myList) {
                let current = Object.keys(myList[i]).length;
                if (current > rowLen) {
                    rowLen = current;
                    max = i;
                }
            }

            for (let i in myList[max]) {
                output += "<div class='row result'>";

                output += "<div class='col bg-secondary text-light' >";
                output += i;
                output += "</div>";

                for (let j = 0; j < myList.length; j++) {
                    output += "<div class='col m-1'>";
                    output += myList[j][i];
                    output += "</div>";
                }
                output += "</div>";
            }

            $(selector).append(output);
        }

    </script>
     <?php get_footer();?>
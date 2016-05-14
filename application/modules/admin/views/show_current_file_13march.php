<?php $marked_file =  current_pending_files(); ?>
        <table class="table table-condensed text-center">
            <tr style="font-weight: 900;font-size: 20px;">
                <th colspan="6">कुल अंकित फाइलें : <span style="color: red;font-family: sans-serif;"> <?php echo $marked_file['files_no']; ?></span></th>
            </tr>
            <tr align="center">
                <th style="background: #BEDEDE;">पुरानी अंकित फाइलें</th>
                <th style="background: #BEDEDE;">आज की कार्यरत फाइलें </th>
                <th style="background: #91D096;">प्रक्रियाधीन फाइलें</th>
                <th style="background: #91D096;">प्राप्त नहीं की गई फाइलें</th>
                <th style="background: #DCB45A;">भौतिक-फाइलें</th>
                <th style="background: #DCB45A;">ई-फाइलें</th>
            </tr>
            <tr align="center" style="font-weight: 900;font-size: 20px;">
                <td class="total_files_received" style="background: #BEDEDE;">
                       <?php   echo $marked_file['old_file']; ?>
                </td>
                <td class="total_files_received" style="cursor:pointer;background: #BEDEDE;" onclick='showpage("<?php echo base_url(); ?>")'>
							<?php   echo $marked_file['today_file']; ?>
                </td>
                <td class="total_files_received"  style="background: #91D096;">
                        <?php   echo $marked_file['noterceived']; ?>
                </td>
                <td class="total_files_received"  style="background: #91D096;">
                       <?php   echo $marked_file['received']; ?>
                </td>
                <td class="total_files_received" style="background: #DCB45A;">
                       <?php $pfile = $marked_file['files_no']-$marked_file['efile'];
                        echo $pfile; ?>
                </td>
                <td class="total_files_received" style="background: #DCB45A;">
                        <?php   echo $marked_file['efile']; ?>
                </td>
            </tr>
        </table>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <meta name="description" content="Issue accepted">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>



<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: Open Sans, sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:40px;"></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <img src="views/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color: #1e1e2d; font-weight: 500; margin: 0; font-size: 32px; font-family: Rubik,sans-serif;">
                                            <br>
                                            <?php echo $title_text_ppal; ?><br>
                                        </h1>
                                        <div class="container-fluid">
                                            <div class="row">
                                            </div>
                                        </div>
                                        <div class="card card-outline card-secondary">
                                            <div class="card-body box-profile"><span style="display:inline-block; vertical-align:middle; border-bottom:1px solid #cecece; width:100px; padding: 2px;"></span>
                                                <h3 class="text-center">Issue: <b><span id="ID_Issue"><?php echo $new_issue_save; ?></span></b></h3>
                                                <div class="form-group">
                                                    <!-- Date -->
                                                    <label><strong>Date:</strong></label>
                                                    <?php echo $new_issue_reporteddate; ?><br>
                                                    <!-- Due Date -->
                                                    <label for="label"><strong>Summary:</strong></label>
                                                    <?php echo $issue_summary;  ?>
                                                    <br>
                                                </div>
                                                <h4 class="text-center">Members:<br>
                                                    <?php echo $list_membres_custom; ?></h4>
                                                <span style="display:inline-block; vertical-align:middle; border-bottom:1px solid #cecece; width:100px; padding: 2px;"></span>
                                            </div>
                                        </div>
                                        <p><br>
                                            Keep track of the ISSUE by clicking the following link<br>
                                        </p>
                                        <a href="https://www.opsmodal.com/vms_beta?c=issues&m=viewissue&ID_Issue=<?php echo $new_issue_save; ?>" style="background:#20e277; text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">View Issue</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;"></td>
                                </tr>

                            </table>

                        </td>

                    </tr>

                    <tr>

                        <td style="height:20px;">&nbsp;</td>

                    </tr>

                    <tr>

                        <td style="text-align:center;">

                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;"><strong>VMS - Oakland Port Services<br></strong></p>

                        </td>

                    </tr>

                    <tr>

                        <td style="height:40px;"></td>

                    </tr>

                </table>

            </td>

        </tr>

    </table>





</body>
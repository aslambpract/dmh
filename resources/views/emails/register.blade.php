<html lang="en"><head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> {{$company_name}} - </title>

    </head>

    <body>

         <table width="600" bgcolor="#f9f9f9" style="font-family: MyriadPro-Regular, 'Myriad Pro Regular', MyriadPro, 'Myriad Pro', Helvetica, Arial, sans-serif;">    <tbody><tr>

        <td align="center" style="padding: 5px 15px 0px 15px;" class="section-padding">

            <table border="0" cellpadding="0" align="center" cellspacing="0" class="responsive-table">

            <tbody><tr><td align="left" valign="top" style="padding:10px;font:9px/15px Arial;text-align:justify;color:#a6a6a6">You are receiving this mail as a registered member of  flytoinfinity  Please add <a href="mailto:info@flytoinfinity.com" style="text-decoration:underline;color:#a6a6a6" target="_blank">info@flytoinfinity.com</a> to your address book to ensure delivery into your inbox.</td></tr>

            </tbody></table>

        </td>

    </tr>

</tbody></table>

        <table width="600" bgcolor="#f9f9f9" style="font-family: MyriadPro-Regular, 'Myriad Pro Regular', MyriadPro, 'Myriad Pro', Helvetica, Arial, sans-serif;">

            <thead>

                <tr>

                <td style="padding:22px 30px 18px 30px; border-bottom:2px solid #1e2064"><img src="{{ url('img/cache/logo/dalsarulogo.png') }}" height="60" alt="flytoinfinity"></td>    


                </tr>

            </thead>

            <tbody>

                <tr>

                    <td style="padding:30px 30px 10px 30px"><h2 style="color:#000;">You are registerd to {{$company_name}}</h2></td>

                </tr>

                <tr>

                    <td style="padding:0px 30px 20px 30px;"><p style="font-size:14px; color:#666666;">


                  Hi {{$firstname}} 


 <p>Welcome to flytoinfinity.com! Thanks so much for joining us. You’re on your way to a brand new business. </p>

<p>flytoinfinity is a MLM app that helps you focus wide range of earning possibilities  by only allowing you to grow your network members at high payout. Set and track daily, weekly, and monthly income.  </p>
<p>
Purchase plan regularly to keep earnings from flytoinfinity. Here you can track your growth and monitor your income. 
</p>
<p>
Remember, you can also Add advertising accounts here to make more revenue.  Get merchants who wish to list their business on flytoinfinity app. </p>
<p>
Have any questions? Just shoot us an email! We’re always here to help.</p>


<p> 
      


Cheerfully yours, <br>
The flytoinfinity Coach

</p>

                    </td>

                </tr>

                <tr>

                    <td style="padding:20px 30px">

                        <b style="color:#000; font-size:16px;">Username : {{$login_username}} </b><br>
                        <b style="color:#000; font-size:16px;">password : {{$password}} </b><br>


                        <a style="color:#ff0099; font-size:16px;" href="{{url('/login')}}" target="_blank">Click here to login</a>

                    </td>
                </tr>
            </tbody>

            <tfoot bgcolor="#c1c1c1">

                <tr>

                    <td style="padding:20px 30px"><p style="font-size:12px; color:#000000;">Copyright © {{Date('Y')}} {{$company_name}}. All Rights Reserved</p></td>

                </tr>

            </tfoot>

        </table>

</body>
  </html>
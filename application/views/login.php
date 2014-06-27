<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="login">
	<div class="container">
    <h1>Sign in</h1>
    <div id="iforms_r5" style="text-align:center;font-size:12px"></div>
	<form method="post" action="<?php echo base_url(); ?>index.php/process/login" id="iforms_f5" onsubmit="return iForms_s(5)">
    <input type="hidden" id="timereload" value="1" />
    <table>
    <tr>
    	<td width="110" class="pt5"><label for="uname">Username</label></td>
    	<td><input type="text" id="uname" name="uname" /></td>
	</tr>
    <tr>
    	<td class="pt5"><label for="password">Password</label></td>
    	<td><input type="password" id="password" name="password" /></td>
	</tr>
    <tr>
    	<td></td>
    	<td> <input type="submit" value="Sign In" /></td>
	</tr>
    </table>
    </form>
    <script type="text/javascript">try{ document.getElementById("uname").focus(); }catch(e){}</script>
    </div>
</div>
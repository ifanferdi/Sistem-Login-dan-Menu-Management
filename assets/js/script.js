$(function () {

	$('.btnAddMenu').on('click', function () {
		$('#modalMenuLabel').html('Add New Menu');
		$('.modal-footer button[type=submit]').html('Save');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/menu');
		$('.confirmation').attr('hidden', 1);
		$('#menu').removeAttr('readonly', 1)


		$('#id').val('');
		$('#menu').val('');
	});

	$('.btnEditMenu').on('click', function () {
		$('#modalMenuLabel').html('Edit Menu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/menu/editMenu');
		$('.confirmation').attr('hidden', 1);
		$('#menu').removeAttr('readonly', 1)


		const idMenu = $(this).data('id');

		$.ajax({
			url: 'http://localhost/wp-login/menu/getIdMenu',
			data: {
				id: idMenu
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				$('#id').val(data.id);
				$('#menu').val(data.menu);
			}
		});
	});

	$('.btnDeleteMenu').on('click', function () {
		$('#modalMenuLabel').html('Delete Menu Confirmation');
		$('.modal-footer button[type=submit]').html('Delete');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/menu/deleteMenu');
		$('.confirmation').removeAttr('hidden', 1);
		$('#menu').attr('readonly', 1)

		const idMenu = $(this).data('id');

		$.ajax({
			url: 'http://localhost/wp-login/menu/getIdMenu',
			data: {
				id: idMenu
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				$('#id').val(data.id);
				$('#menu').val(data.menu);
			}
		});
	});



	// End of Javascript Menu

	//----------------------------------------------------------------------------------

	// Javascript Submenu

	$('.btnAddSubmenu').on('click', function () {
		$('#modalSubmenuLabel').html('Add New Submenu');
		$('.modal-footer button[type=submit]').html('Save');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/menu/submenu');
		$('.confirmation').attr('hidden', 1);

		$('#title').removeAttr('readonly', 1)
		$('#menu_id').removeAttr('readonly', 1)
		$('#url').removeAttr('readonly', 1)
		$('#icon').removeAttr('readonly', 1)
		$('#is_active').removeAttr('readonly', 1)


		$('#id').val('');
		$('#title').val('');
		$('#menu_id').val('');
		$('#url').val('');
		$('#icon').val('');
		$('#is_active').val('1');
	});

	$('.btnEditSubmenu').on('click', function () {
		$('#modalSubmenuLabel').html('Edit Submenu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/menu/editSubmenu');
		$('.confirmation').attr('hidden', 1);

		$('#title').removeAttr('readonly', 1)
		$('#menu_id').removeAttr('readonly', 1)
		$('#url').removeAttr('readonly', 1)
		$('#icon').removeAttr('readonly', 1)
		$('#is_active').removeAttr('readonly', 1)

		const idSubmenu = $(this).data('id');

		$.ajax({
			url: 'http://localhost/wp-login/menu/getIdSubmenu',
			data: {
				id: idSubmenu
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				$('#id').val(data.id);
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#is_active').val(data.is_active);
			}
		});
	});

	$('.btnDeleteSubmenu').on('click', function () {
		$('#modalSubmenuLabel').html('Delete Submenu Confirmation');
		$('.modal-footer button[type=submit]').html('Delete');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/menu/deleteSubmenu');
		$('.confirmation').removeAttr('hidden', 1);

		$('#title').attr('readonly', 1)
		$('#menu_id').attr('readonly', 1)
		$('#url').attr('readonly', 1)
		$('#icon').attr('readonly', 1)
		$('#is_active').attr('readonly', 1)

		const idSubmenu = $(this).data('id');

		$.ajax({
			url: 'http://localhost/wp-login/menu/getIdSubmenu',
			data: {
				id: idSubmenu
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				$('#id').val(data.id);
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#is_active').val(data.is_active);
			}
		});
	});

	//Checkbox User Access Menu
	$('.btnCheck').on('click', function () {

		const menu_id = $(this).data('menu');
		const role_id = $(this).data('role');

		$.ajax({
			url: 'http://localhost/wp-login/admin/change_access',
			type: 'post',
			data: {
				menuId: menu_id,
				roleId: role_id
			},
			success: function () {
				document.location.href = "http://localhost/wp-login/admin/roleaccess/" + role_id;
			}
		});
	});

	$('.btnAddRole').on('click', function () {
		$('#modalRoleLabel').html('Add New User Role');
		$('.modal-footer button[type=submit]').html('Save');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/admin/role');
		$('.confirmation').attr('hidden', 1);
		$('#role').removeAttr('readonly', 1)


		$('#id').val('');
		$('#role').val('');
	});

	$('.btnEditRole').on('click', function () {
		$('#modalRoleLabel').html('Edit User Role');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/admin/editRole');
		$('.confirmation').attr('hidden', 1);
		$('#role').removeAttr('readonly', 1)
		console.log("sukses");

		const idRole = $(this).data('id');

		$.ajax({
			url: 'http://localhost/wp-login/admin/getIdRole',
			data: {
				id: idRole
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				$('#id').val(data.id);
				$('#role').val(data.role);
			}
		});
	});

	$('.btnDeleteRole').on('click', function () {
		$('#modalRoleLabel').html('Delete Role Confirmation');
		$('.modal-footer button[type=submit]').html('Delete');
		$('.modal-content form').attr('action', 'http://localhost/wp-login/admin/deleteRole');
		$('.confirmation').removeAttr('hidden', 1);
		$('#role').attr('readonly', 1)

		const idRole = $(this).data('id');

		$.ajax({
			url: 'http://localhost/wp-login/admin/getIdRole',
			data: {
				id: idRole
			},
			dataType: 'json',
			method: 'post',
			success: function (data) {
				$('#id').val(data.id);
				$('#role').val(data.role);
			}
		});
	});

	//Upload File
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
});

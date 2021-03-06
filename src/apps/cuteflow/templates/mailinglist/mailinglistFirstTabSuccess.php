cf.mailinglistFirstTab = function(){return {	theNameFieldset				:false,	theSenderFieldset			:false,	theAuthorizationFieldset	:false,	theFormPanel				:false,	theComboDocumentStore		:false,	theUserGrid					:false,	theUserStore				:false,	theUserCM					:false,	theAllowedSenderGrid		:false,	theAllowedSenderCM			:false,	theAllowedSenderStore		:false,	theColumnPanel				:false,	theAuthorizationCM			:false,	theAuthorizationStore		:false,	theAuthorizationGrid		:false,	theUniqueId					:false,	theUserToolbar				:false,	theAllowedSenderToolbar		:false,	theComboLoadingMask			:false,	theSendToAllSlots			:false,		/** 	*	* init first tab	*	*@param string storeurl, url to load store for auth	*@param int id, id of the record when in edit mode	*	*/	init:function (storeurl, id) {		this.theUniqueId = 1;		this.initToolbar();		this.initCM();		this.initStore(id);		this.initAllowedSenderGrid(id);		this.initUserGrid();				this.initColumnPanel();		this.theColumnPanel.add(this.theUserGrid);		this.theColumnPanel.add(this.theAllowedSenderGrid);		this.initSenderFieldset();		this.theSenderFieldset.add(this.theColumnPanel);		this.initComboDocumentStore();		this.initNameFieldset();		this.initFormPanel();		this.theFormPanel.add(this.theNameFieldset);		this.theFormPanel.add(this.theSenderFieldset);			},			/** toolbar for live search **/	initToolbar: function () {		this.theUserToolbar =  new Ext.Toolbar({			items: [{				xtype: 'textfield',				id: 'mailinglistFirstTab_userLivesearch',				emptyText:'<?php echo __('Search for User...',null,'mailinglist'); ?>',				width: 200,				enableKeyEvents: true,				listeners: {					keyup: function(el, type) {						var grid = cf.mailinglistFirstTab.theUserGrid;						grid.store.filter('name', el.getValue());					}				}		    },'-',{				icon: '/images/icons/delete.png',				tooltip: '<?php echo __('Clear field',null,'mailinglist'); ?>',				handler: function () {					Ext.getCmp('mailinglistFirstTab_userLivesearch').setValue();					cf.mailinglistFirstTab.theUserGrid.store.filter('name', '');                }			}]		});				/** toolbar for liveseearch **/		this.theAllowedSenderToolbar = new Ext.Toolbar({			items: [{				xtype: 'textfield',				id: 'umailinglistFirstTab_allowedUserLivesearch',				emptyText:'<?php echo __('Search for Allowed users...',null,'mailinglist'); ?>',				width: 200,				enableKeyEvents: true,				listeners: {					keyup: function(el, type) {						var grid = cf.mailinglistFirstTab.theAllowedSenderGrid;						grid.store.filter('name', el.getValue());					}				}		    },'-',{				icon: '/images/icons/delete.png',				tooltip: '<?php echo __('Clear field',null,'mailinglist'); ?>',				handler: function () {					Ext.getCmp('umailinglistFirstTab_allowedUserLivesearch').setValue();					cf.mailinglistFirstTab.theAllowedSenderGrid.store.filter('name', '');                }			}]		});				},					/** init columnpanel **/	initColumnPanel: function () {		this.theColumnPanel = new Ext.Panel({			layout: 'column',			border: false,			frame: false,			layoutConfig: {				columns: 2			}		});	},		/** init the user grid with sending righs **/	initUserGrid: function () {		this.theUserGrid = new Ext.grid.GridPanel({			title: '<?php echo __('Available users',null,'mailinglist'); ?>',			stripeRows: true,			border: false,			width: 272,			height: 250,			ddText: '<?php echo __('Move right please',null,'mailinglist'); ?>',  			collapsible: false,			ddGroup : 'mailinglistDD',			enableDragDrop:true,			allowContainerDrop : false,			autoScroll: true,			style:'margin-top:5px;margin-left:5px;margin-right:5px;',			store: this.theUserStore,			tbar: this.theUserToolbar,			cm: this.theUserCM		});				this.theUserGrid.on('afterrender', function(grid) {			cf.mailinglistFirstTab.theUserStore.load();		});	},		/** init allowed sender grid **/	initAllowedSenderGrid: function (id) {		this.theAllowedSenderGrid = new Ext.grid.GridPanel({			title: '<?php echo __('Allowed to send Mailing list',null,'mailinglist'); ?>',			stripeRows: true,			border: false,			width: 290,			allowContainerDrop : true,			height: 250,			enableDragDrop:true,			collapsible: false,			ddGroup : 'mailinglistDD',			autoScroll: true,			style:'margin-top:5px;margin-left:5px;margin-right:5px;',			store: this.theAllowedSenderStore,			tbar: this.theAllowedSenderToolbar,			cm: this.theAllowedSenderCM					});		this.theAllowedSenderGrid.on('afterrender', function(grid) {			cf.mailinglistFirstTab.theAllowedSenderStore.load();		});				this.theAllowedSenderGrid.on('render', function(grid) { // render drag drop			var secondGridDropTargetEl = grid.getView().scroller.dom;			var secondGridDropTarget = new Ext.dd.DropTarget(secondGridDropTargetEl, {				ddGroup: 'mailinglistDD',				copy: false,				notifyDrop: function(ddSource, e, data){ // when droppping a container in the right grid					if (ddSource.grid != grid){						for(var a=0;a<data.selections.length;a++) { // if data is from left grid, add it to store. 							var item = data.selections[a].data;							var Rec = Ext.data.Record.create({name: 'unique_id'}, {name: 'name'},{name: 'user_id'});							var id = cf.mailinglistFirstTab.theUniqueId++;							grid.store.add(new Rec({unique_id: id, name: item.name, user_id: item.id})); // important to add unique ID's						}					}					else { // if data is coming from right, then reorder is done.						var sm = grid.getSelectionModel();  						var rows = sm.getSelections();  						var cindex = ddSource.getDragData(e).rowIndex;  						 if (sm.hasSelection()) {  							if(typeof(cindex) != "undefined") {								for (i = 0; i < rows.length; i++) {  									grid.store.remove(grid.store.getById(rows[i].id));  									grid.store.insert(cindex,rows[i]);  								}  							}							else { // when trying to add data to the end of the grid								var total_length = grid.store.data.length+1;								for (i = 0; i < rows.length; i++) {  									grid.store.remove(grid.store.getById(rows[i].id));								}								grid.store.add(rows);							}						} 						sm.clearSelections();					}					return true;				}			});		});		},		/** init cm for user and allowed sender **/	initCM: function () {		this.theUserCM =  new Ext.grid.ColumnModel([			{header: "<?php echo __('User',null,'mailinglist'); ?>", width: 240, sortable: false, dataIndex: 'name', css : "text-align : left;font-size:12px;align:center;"}		]);				this.theAllowedSenderCM = new Ext.grid.ColumnModel([			{header: "<?php echo __('User',null,'mailinglist'); ?>", width: 210, sortable: false, dataIndex: 'name', css : "text-align : left;font-size:12px;align:center;"},			{header: "<div ext:qtip=\"<table><tr><td><img src='/images/icons/user_delete.png' />&nbsp;&nbsp;</td><td><?php echo __('Remove user',null,'mailinglist'); ?></td></tr></table>\" ext:qwidth=\"200\"><?php echo __('Action',null,'mailinglist'); ?></div>", width: 50, sortable: true, css : "text-align : left;font-size:12px;align:center;", renderer:this.deleteAllowedUserButton}		]);	},			/**	*Create store for allowed sender and user	*	*@param int id, id of the allowed sender store	*/	initStore: function (id) {		if (id == '') {			var url = '<?php echo build_dynamic_javascript_url('mailinglist/Dummy')?>';		}		else {			var url = '<?php echo build_dynamic_javascript_url('mailinglist/LoadAllAllowedSender')?>/id/' + id;		}		this.theAllowedSenderStore = new Ext.data.JsonStore({				root: 'result',				url: url,				autoload: true,				fields: [					{name: 'name'},					{name: 'user_id'},					{name: 'unique_id'}				]		});				this.theUserStore = new Ext.data.JsonStore({				root: 'result',				url: '<?php echo build_dynamic_javascript_url('mailinglist/LoadAllSender')?>',				autoload: true,				fields: [					{name: 'id'},					{name: 'name'}				]		});			},		/** init fieldset for allowed sender **/	initSenderFieldset: function () {		this.theSenderFieldset = new Ext.form.FieldSet({			title: '<?php echo __('Set allowed Sender',null,'mailinglist'); ?>',			width: 700,			height: 'auto',			style: 'margin-top:20px;margin-left:5px;',			labelWidth: 120		});	},		/** init first tab formpanel **/	initFormPanel: function () {		this.theFormPanel = new Ext.FormPanel({			title: '<?php echo __('General Settings',null,'mailinglist'); ?>',			frame:true,			autoScroll: true,			height: cf.Layout.theRegionWest.getHeight() + cf.Layout.theRegionNorth.getHeight() - 148		});	},		/** init fieldset to add name, and select documenttemplate **/	initNameFieldset: function () {		this.theNameFieldset = new Ext.form.FieldSet({			title: '<?php echo __('Set name, set Slot sending conditions and select Document Template',null,'mailinglist'); ?>',			width: 700,			height: 'auto',			style: 'margin-top:20px;margin-left:5px;',			labelWidth: 180,			items:[{				xtype: 'textfield',				id: 'mailinglistFirstTab_nametextfield',				allowBlank: true,				width: 200,				fieldLabel: '<?php echo __('Name',null,'mailinglist'); ?>'			},{				xtype: 'combo',				fieldLabel : '<?php echo __('Document Template',null,'mailinglist'); ?>',				id: 'mailinglistFirstTab_document_template_id',				valueField: 'id',				mode: 'local',				hiddenName : 'mailinglistFirstTab_documenttemplate',				displayField: 'name',				store: this.theComboDocumentStore,				editable: false,				typeAhead: false,				allowBlank: false,				triggerAction: 'all',				width: 200,				listeners: {					select: {						fn:function(combo, value) {							cf.mailinglistFirstTab.theComboLoadingMask = new Ext.LoadMask(Ext.getBody(), {msg:'<?php echo __('Loading Data...',null,'mailinglist'); ?>'});												cf.mailinglistFirstTab.theComboLoadingMask.show();														try {								cf.mailinglistPopUpWindow.theTabPanel.remove(cf.mailinglistSecondTab.thePanel);								cf.mailinglistSecondTab.thePanel.destroy();								cf.mailinglistSecondTab.init(combo.getRawValue());							}							catch(e){								cf.mailinglistSecondTab.init(combo.getRawValue());							}							cf.mailinglistPopUpWindow.theTabPanel.add(cf.mailinglistSecondTab.thePanel);							var documentemplate_id = combo.getValue();							Ext.Ajax.request({  								url : '<?php echo build_dynamic_javascript_url('mailinglist/LoadFormWithoutUser')?>/id/' + documentemplate_id, 								success: function(objServerResponse){									theJsonTreeData = Ext.util.JSON.decode(objServerResponse.responseText);									data = theJsonTreeData.result;									for(var a=0;a<data.slots.length;a++) {										var fieldset = cf.mailinglistSecondTab.createFieldset(data.slots[a].slot_id,data.slots[a].name,false);										var grid = cf.mailinglistSecondTab.createGrid();										fieldset.add(grid);										cf.mailinglistSecondTab.theLeftPanel.add(fieldset);									}									cf.mailinglistSecondTab.theLeftPanel.doLayout();									cf.mailinglistFirstTab.theComboLoadingMask.hide();								}							}); 											}					}				}							},{				xtype: 'checkbox',				fieldLabel: '<?php echo __('Send to all slots at once',null,'mailinglist'); ?>?',				inputValue: '1',				style: 'margin-top:3px;',				checked: false,				id: 'mailinglistFirstTab_sendtoallslots'			}]		});	},		/** init combostore with documenttemplates **/	initComboDocumentStore: function () {		this.theComboDocumentStore = new Ext.data.JsonStore({				root: 'result',				url: '<?php echo build_dynamic_javascript_url('mailinglist/LoadAllDocuments')?>',				autoload: true,				fields: [					{name: 'id'},					{name: 'name'}				]		});		this.theComboDocumentStore.load();	},					/** render Delete Button to right grid in each row **/	deleteAllowedUserButton: function (data, cell, record, rowIndex, columnIndex, store, grid) {			cf.mailinglistFirstTab.theUniqueId++;			var id = record.data.unique_id;			var btn = cf.mailinglistFirstTab.createDeleteButton.defer(500,this, [id]);			return '<center><table><tr><td><div id="mailinglistFirstTab_removeuser_'+ id +'"></div></td></tr></table></center>';	},		/**	* build the label and the button for the grid	*	*	*@param int id, id of the record	*/	createDeleteButton: function (id) {		var btn_edit = new Ext.form.Label({			renderTo: 'mailinglistFirstTab_removeuser_' + id,			html: '<span style="cursor:pointer;"><img src="/images/icons/user_delete.png" /></span>',			listeners: {				render: function(c){					  c.getEl().on({						click: function(el){							var item = cf.mailinglistFirstTab.theAllowedSenderGrid.store.findExact('unique_id', id );							cf.mailinglistFirstTab.theAllowedSenderGrid.store.remove(item);						},					scope: c				});				}			}		});	}	};}();
<?php
namespace ObjectTablePhp\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use ObjectTablePhp\Core\Cell;

use ObjectTablePhp\Core\StyleExcel;

/**
* Parsea un objeto Tabla y crea su versión Excel.
* @author    : Agustin Rios Reyes
* @copyright : Copyright (c) 2018 AR2
* @package   : Excel
*/
class TableToExcel
{
	private $lobSpreadsheet             = NULL;
	private $lobStyleExcel              = NULL;
	private $lobIOFactoryExcel          = NULL;
	private $lobObjectTable             = NULL;

	private $lstProCreator              = '';
	private $lstProLastModifiedBy       = '';
	private $lstProTitle                = '';
	private $lstProSubject              = '';
	private $lstProDescription          = '';
	private $lstProKeywords             = '';
	private $lstProCategory             = '';

	private $lstStorageDirectory        = '';
	private $lstFileCss                 = '';
	private $lstTypeFile                = 'Xlsx';//-->Ods,Xls,Xlsx,Pdf
	private $lstNameFile                = 'Spreadsheet';
	private $lstSpreadsheetPassword     = 'Spreadsheet1234';
	private $lstSheeName                = 'sheet 1';
	private $lstActiveSheetByName       = 'sheet 1';
	private $lstPositionCaprion         = 'top';
	private $lnuActiveSheetIndex        = 0;
	private $lnuMarginCaprion           = 0;
	private $lobActiveSheet             = NULL;
	private $lboLog                     = true;
	private $lboSaveFile                = true;
	private $lboDownload                = false;
	private $lboBlockedSpreadsheet      = false;
	private $layValidFileTypes          = array('Ods','Xls','Xlsx','Pdf');

	function __construct()
	{
		$this->lstProCreator              = 'Agustin Rios Reyes';
		$this->lstProLastModifiedBy       = 'Agustin Rios Reyes';
		$this->lstProTitle                = 'Office 2007 XLSX Test Document';
		$this->lstProSubject              = 'Office 2007 XLSX Test Document';
		$this->lstProDescription          = 'Test document for Office 2007 XLSX, generated using PHP classes.';
		$this->lstProKeywords             = 'office 2007 openxml php';
		$this->lstProCategory             = 'report Test result file';
		$this->lstNameFile                = 'Spreadsheet'.date('YmdHi');
		$this->lstStorageDirectory        = sys_get_temp_dir().'/phpspreadsheet';

		//--> Create new Spreadsheet object
		$this->lobSpreadsheet             = new Spreadsheet();
		$this->lobStyleExcel              = new StyleExcel();
		$this->Helper                     = new Sample();
		$this->lobSpreadsheet->setActiveSheetIndex($this->lnuActiveSheetIndex);
		$this->lobActiveSheet             = $this->lobSpreadsheet->getActiveSheet();
	}
	
	public function setCreator            ( $pstValue = ''     ){ $this->lstProCreator             = $pstValue; }
	public function setLastModifiedBy     ( $pstValue = ''     ){ $this->lstProLastModifiedBy      = $pstValue; }
	public function setTitle              ( $pstValue = ''     ){ $this->lstProTitle               = $pstValue; }
	public function setSubject            ( $pstValue = ''     ){ $this->lstProSubject             = $pstValue; }
	public function setDescription        ( $pstValue = ''     ){ $this->lstProDescription         = $pstValue; }
	public function setKeywords           ( $pstValue = ''     ){ $this->lstProKeywords            = $pstValue; }
	public function setCategory           ( $pstValue = ''     ){ $this->lstProCategory            = $pstValue; }
	public function setTypeFile           ( $pstValue = 'Xlsx' ){ $this->lstTypeFile               = ( in_array($pstValue, $this->layValidFileTypes) ) ? $pstValue : 'Xlsx'; }
	public function setNameFile           ( $pstValue = ''     ){ $this->lstNameFile               = $pstValue; }
	public function setStorageDirectory   ( $pstValue = ''     ){ $this->lstStorageDirectory       = $pstValue; }
	public function setSpreadsheetPassword( $pstValue = 'Spreadsheet1234'){ $this->lstSpreadsheetPassword    = $pstValue; }
	public function setstSheeName         ( $pstValue = ''     ){ $this->lstSheeName               = $pstValue; }
	public function setMarginCaprion      ( $pnuValue = 0      ){ $this->lnuMarginCaprion          = $pnuValue; }
	public function setObjectTable        ( $pobValue = NULL   ){ $this->lobObjectTable            = $pobValue; }
	public function setSpreadsheetBlocked ( $pboValue = false  ){ $this->lboBlockedSpreadsheet     = $pboValue; }
	public function setSaveFile           ( $pboValue = true   ){ $this->lboSaveFile               = $pboValue; }
	public function setDownload           ( $pboValue = false  ){ $this->lboDownload               = $pboValue; }
	public function setLog                ( $pboValue = true   ){ $this->lboLog                    = $pboValue; }
	public function setValidFileTypes     ( $payValue = array()){ $this->layValidFileTypes         = ( count($payValue) > 0 ) ? $payValue : array('Ods','Xls','Xlsx','Pdf'); }

	public function getCreator            (){ return $this->lstProCreator;          }
	public function getLastModifiedBy     (){ return $this->lstProLastModifiedBy;   }
	public function getTitle              (){ return $this->lstProTitle;            }
	public function getSubject            (){ return $this->lstProSubject;          }
	public function getDescription        (){ return $this->lstProDescription;      }
	public function getKeywords           (){ return $this->lstProKeywords;         }
	public function getCategory           (){ return $this->lstProCategory;         }
	public function getTypeFile           (){ return $this->lstTypeFile;            }
	public function getNameFile           (){ return $this->lstNameFile;            }
	public function getStorageDirectory   (){ return $this->lstStorageDirectory;    }
	public function getSpreadsheetPassword(){ return $this->lstSpreadsheetPassword; }
	public function getstSheeName         (){ return $this->lstSheeName;            }
	public function getActiveSheetByName  (){ return $this->lstActiveSheetByName;   }
	public function getFileCss            (){ return $this->lstFileCss;             }
	public function getMarginCaprion      (){ return $this->lnuMarginCaprion;       }
	public function getObjectTable        (){ return $this->lobObjectTable;         }
	public function getSpreadsheetBlocked (){ return $this->lboBlockedSpreadsheet;  }
	public function getSaveFile           (){ return $this->lboSaveFile;            }
	public function getDownload           (){ return $this->lboDownload;            }
	public function getActiveSheetIndex   (){ return $this->lnuActiveSheetIndex;    }
	public function getValidFileTypes     (){ return $this->layValidFileTypes;      }

	public function setFileCss( $pstValue = '' )
	{
		$this->lstFileCss    = $pstValue;
		//$this->lobStyleExcel = new StyleExcel();
		$this->lobStyleExcel->setStyleFileCss( $this->lstFileCss );
	}

	public function setDataCss( $pstCss = '' )
	{
		//$this->lobStyleExcel = new StyleExcel();
		$this->lobStyleExcel->setStyleDataCss( $pstCss );
	}

	//public function setActiveSheetByName  ( $pstValue = ''     ){ $this->lstActiveSheetByName      = $pstValue; }
	//public function setActiveSheetIndex   ( $pnuValue = 0      ){ $this->lnuActiveSheetIndex       = $pnuValue; }
	public function setActiveSheet( $pnuIndex = 0, $pstTitle = 'sheet 1' )
	{
		$this->lnuActiveSheetIndex  = (int)$pnuIndex;
		$this->lstSheeName          = $pstTitle;

		if(  $this->lnuActiveSheetIndex >= $this->lobSpreadsheet->getSheetCount() )
		{
			$this->lobActiveSheet =  $this->lobSpreadsheet->createSheet();
			
		}
		else
		{
			$this->lobSpreadsheet->setActiveSheetIndex($this->lnuActiveSheetIndex);
			$this->lobActiveSheet = $this->lobSpreadsheet->getActiveSheet();
		}

		$this->lobActiveSheet->setTitle( $this->lstSheeName );
		$this->lobActiveSheet->getPageSetup()->setFitToWidth(0);
		$this->lobActiveSheet->getPageSetup()->setFitToHeight(0);	
	}

	public function mPrintObjectTableInExcel()
	{
		$this->mObjectTableParserInExcel();

		//-->Setting security on a spreadsheet.
		if( $this->lboBlockedSpreadsheet )
		{
			//$this->lobSpreadsheet->getSecurity()->setLockWindows(true);
			//$this->lobSpreadsheet->getSecurity()->setLockStructure(true);
			//$this->lobSpreadsheet->getSecurity()->setWorkbookPassword($this->lstSpreadsheetPassword);

			$this->lobActiveSheet->getProtection()->setPassword($this->lstSpreadsheetPassword);
			$this->lobActiveSheet->getProtection()->setSheet(true);
			$this->lobActiveSheet->getProtection()->setSort(true);
			$this->lobActiveSheet->getProtection()->setInsertRows(true);
			$this->lobActiveSheet->getProtection()->setFormatCells(true);
		}

		if( $this->lboSaveFile )
		{
			$this->mValidateDirectory();

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        	//$this->lobSpreadsheet->setActiveSheetIndex( $this->lnuActiveSheetIndex );

			$lstDirectoryFile = $this->lstStorageDirectory.'/'.$this->lstNameFile.'.'.$this->lstTypeFile;
			$lobWriterFile    = IOFactory::createWriter($this->lobSpreadsheet, $this->lstTypeFile);
			$lobWriterFile->save($lstDirectoryFile);
		}

		if( $this->lboDownload )
		{
			if( $this->lstTypeFile == 'ods' )
			{
				
				// Redirect output to a client’s web browser (Ods)
				header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
				header('Content-Disposition: attachment;filename="01simple.ods"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');

				// If you're serving to IE over SSL, then the following may be needed
				header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
				header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header('Pragma: public'); // HTTP/1.0

				$writer = IOFactory::createWriter($spreadsheet, 'Ods');
				$writer->save('php://output');
				exit;
			}
			else if ($this->lstTypeFile == 'xls' )
			{
				// Redirect output to a client’s web browser (Xls)
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="01simple.xls"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');

				// If you're serving to IE over SSL, then the following may be needed
				header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
				header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header('Pragma: public'); // HTTP/1.0

				$writer = IOFactory::createWriter($spreadsheet, 'Xls');
				$writer->save('php://output');
				exit;
			}
			else if( $this->lstTypeFile == 'xlsx' )
			{
				// Redirect output to a client’s web browser (Xlsx)
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="01simple.xlsx"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');

				// If you're serving to IE over SSL, then the following may be needed
				header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
				header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header('Pragma: public'); // HTTP/1.0

				$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
				$writer->save('php://output');
				exit;
			}
			else if( $this->lstTypeFile == 'pdf' )
			{
				IOFactory::registerWriter('Pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);

				// Redirect output to a client’s web browser (PDF)
				header('Content-Type: application/pdf');
				header('Content-Disposition: attachment;filename="01simple.pdf"');
				header('Cache-Control: max-age=0');

				$writer = IOFactory::createWriter($spreadsheet, 'Pdf');
				$writer->save('php://output');
				exit;
			}
		}
	}

	private function mValidateDirectory()
	{
		if (!is_dir($this->lstStorageDirectory))
		{
			if (!mkdir($this->lstStorageDirectory) && !is_dir($this->lstStorageDirectory))
			{
				throw new \RuntimeException(sprintf('Directory "%s" was not created', $this->lstStorageDirectory));
			}
		}
	}

	private function mObjectTableParserInExcel()
	{
		if( is_null( $this->lobObjectTable  ) || !is_object( $this->lobObjectTable ) )
		{
			if( $this->lboLog )
			{
				error_log("Class: TableToExcel Method: mPrintObjectTableInExcel  Erro: El objeto Tabla esta vacío o no fue indicado. ");
				return '';
			}
			else
				return '';
		}
		else
		{
			$this->lobSpreadsheet->getProperties()->setCreator($this->lstProCreator)
												  ->setLastModifiedBy($this->lstProLastModifiedBy)
												  ->setTitle($this->lstProTitle)
												  ->setSubject($this->lstProSubject)
												  ->setDescription($this->lstProDescription)
												  ->setKeywords($this->lstProKeywords)
												  ->setCategory($this->lstProCategory);

			//--> Obtener datos de la Tabla
			$lstId               = ( $this->lobObjectTable->getId()          !='' ) ? $this->lobObjectTable->getId()          : '';
			$lstClass            = ( $this->lobObjectTable->getClass()       !='' ) ? $this->lobObjectTable->getClass()       : '';
			$lstStyle            = ( $this->lobObjectTable->getStyle()       !='' ) ? $this->lobObjectTable->getStyle()       : '';
			$lstTabindex         = ( $this->lobObjectTable->getTabindex()    !='' ) ? $this->lobObjectTable->getTabindex()    : '';
			$lstAccesskey        = ( $this->lobObjectTable->getAccesskey()   !='' ) ? $this->lobObjectTable->getAccesskey()   : '';
			$lstTitle            = ( $this->lobObjectTable->getTitle()       !='' ) ? $this->lobObjectTable->getTitle()       : '';
			$lnuWidth            = ( $this->lobObjectTable->getWidth()       != 0 ) ? $this->lobObjectTable->getWidth()       :  0;
			$lnuHeight           = ( $this->lobObjectTable->getHeight()      != 0 ) ? $this->lobObjectTable->getHeight()      :  0;
			$lstAlign            = ( $this->lobObjectTable->getAlign()       !='' ) ? $this->lobObjectTable->getAlign()       : '';
			$lstCellpadding      = ( $this->lobObjectTable->getCellpadding() !='' ) ? $this->lobObjectTable->getCellpadding() : '';
			$lstCellspacing      = ( $this->lobObjectTable->getCellspacing() !='' ) ? $this->lobObjectTable->getCellspacing() : '';
			$lstBorder           = ( $this->lobObjectTable->getBorder()      !='' ) ? $this->lobObjectTable->getBorder()      : '';
			$lnuLengthAttributes = $this->lobObjectTable->getLengthAttributes();
			$lnuLengthEvent      = $this->lobObjectTable->getLengthEvent();
			$layAttributesAdd    = ( $lnuLengthAttributes > 0 ) ? $this->lobObjectTable->getAttributesAdd() : array();
			$layEvent            = ( $lnuLengthEvent > 0      ) ? $this->lobObjectTable->getEvent()         : array();

			//-->Obtenemos las Secciones thead,tbody y tfoot
			$lnuLengthSections = $this->lobObjectTable->getLengthSections();
			$lnuLengthRows     = $this->lobObjectTable->getLengthRows();
			$laySections       = ( $lnuLengthSections > 0  ) ? $this->lobObjectTable->getSections() : array();

			if( $lnuLengthSections > 0  )
			{
				//-->Obtener Caption
				$lobCaption = $this->lobObjectTable->getCaption();
				$lnuRows    = 1;
				$layRowspan = array();

				if( !is_null($lobCaption) )
				{
					if( $lobCaption->getCaptionText () != '' )
					{
						if( $this->lstPositionCaprion == 'top' )
						{
							$lnuRowsCap = $lnuRows;

							if( $this->lnuMarginCaprion <= 0)
								$lnuRows++;
							else
							{
								$lnuRows = $lnuRows+1+$this->lnuMarginCaprion;
								$this->lobActiveSheet->insertNewRowBefore($lnuRows, $this->lnuMarginCaprion);
							}
						}
						elseif( $this->lstPositionCaprion == 'bottom' )
						{
							$lnuRowsCap = $lnuLengthRows+1+$this->lnuMarginCaprion;
						}

						$lobCell        = new Cell();
						$lnuMaxCells    = max( $laySections[1]->getRowCells() );
						$lobCell->mcreateIdExcel($lnuRowsCap,0);
						$lstInitialCell = $lobCell->getIdExcel();
						$lobCell->mcreateIdExcel($lnuRowsCap,$lnuMaxCells-1);
						$lstFinalCell   = $lobCell->getIdExcel();
						$lstText        = $lobCaption->getCaptionText ();

						//$this->lobActiveSheet->duplicateStyle( $this->lobActiveSheet->getStyle($lstInitialCell), $lstInitialCell.':'.$lstFinalCell );
						$this->lobActiveSheet->mergeCells($lstInitialCell.':'.$lstFinalCell);
						$this->lobActiveSheet->setCellValue($lstInitialCell, $lstText);
					}
				}

				$lnuMaxRows = $this->lobActiveSheet->getHighestRow();

				foreach ( $laySections as $laySection => $lobSection )
				{
					$lnuTotalRows  = $lobSection->getLengthRows();
					$layRows       = $lobSection->getRows();

					if( $lnuTotalRows > 0 )
					{
						foreach ( $layRows as $layRows => $lobRow )
						{
							$lstId               = ( $lobRow->getId()    != '' ) ? $lobRow->getId()   : '';
							$lstClass            = ( $lobRow->getClass() != '' ) ? $lobRow->getClass(): '';
							$lstStyle            = ( $lobRow->getStyle() != '' ) ? $lobRow->getStyle(): '';
							$lboVisible          = $lobRow->getVisible();
							$lnuLengthCeldas     = $lobRow->getLengthCells();
							$layCells            = ( $lnuLengthCeldas     > 0 ) ? $lobRow->getCells() : array();

							if( $lboVisible == false )//-->hide a row
								$this->lobActiveSheet->getRowDimension($lnuRows)->setVisible(false);

							if( $lnuLengthCeldas > 0 )
							{
								$lnuCells = 0;
								
								foreach ($layCells as $layCells => $lobCell )
								{
									$lobCell->mcreateIdExcel($lnuRows,$lnuCells);
									$lstIdCell           = $lobCell->getIdExcel();
									$lstColumnExcel      = $lobCell->getColumnExcel();

									while( isset( $layRowspan[$lstIdCell] ) && $layRowspan[$lstIdCell] == 1 )
					                {
					                    $lnuCells++;
					                	
					                	$lobCell->mcreateIdExcel($lnuRows,$lnuCells);
					                    $lstIdCell           = $lobCell->getIdExcel();
										$lstColumnExcel      = $lobCell->getColumnExcel();
					                }

									$lstId               = ( $lobCell->getId()              !='' ) ? $lobCell->getId()              : '';
									$lstClass            = ( $lobCell->getClass()           !='' ) ? $lobCell->getClass()           : '';
									$lstStyle            = ( $lobCell->getStyle()           !='' ) ? $lobCell->getStyle()           : '';
									$lstTabindex         = ( $lobCell->getTabindex()        !='' ) ? $lobCell->getTabindex()        : '';
									$lstAccesskey        = ( $lobCell->getAccesskey()       !='' ) ? $lobCell->getAccesskey()       : '';
									$lstTitle            = ( $lobCell->getTitle()           !='' ) ? $lobCell->getTitle()           : '';
									$lstAbbr             = ( $lobCell->getAbbr()            !='' ) ? $lobCell->getAbbr()            : '';
									$lstScope            = ( $lobCell->getScope()           !='' ) ? $lobCell->getScope()           : '';
									$lstHeaders          = ( $lobCell->getHeaders()         !='' ) ? $lobCell->getHeaders()         : '';
									$lnuWidth            = ( $lobCell->getWidth()           != 0 ) ? (int)$lobCell->getWidth()      :  0;
									$lnuHeight           = ( $lobCell->getHeight()          != 0 ) ? (int)$lobCell->getHeight()     :  0;
									$lstVerticalAlign    = ( $lobCell->getVerticalAlign()   !='' ) ? $lobCell->getVerticalAlign()   : '';
									$lstAlign            = ( $lobCell->getAlign()           !='' ) ? $lobCell->getAlign()           : '';
									$lstBackgroundColor  = ( $lobCell->getBackgroundColor() !='' ) ? $lobCell->getBackgroundColor() : '';
									$lnuColspan          = ( $lobCell->getColspan()          > 1 ) ? (int)$lobCell->getColspan()    :  0;
									$lnuRowspan          = ( $lobCell->getRowspan()          > 1 ) ? (int)$lobCell->getRowspan()    :  0;
									//$lstBorder           = ( $lobCell->getBorder()          !='' ) ? $lobCell->getBorder()          : '';
									$lstfont             = ( $lobCell->getfont()            !='' ) ? $lobCell->getfont()            : '';
									$lstValue            = ( $lobCell->getValue()           !='' ) ? $lobCell->getValue()           : '';
									//$lstType             = ( $lobCell->getType()            !='' ) ? $lobCell->getType()            : $pstTypeCelda;
									$lstDataType         = ( $lobCell->getDataType()        !='' ) ? $lobCell->getDataType()        : 'String';
									$lboVisible          = $lobCell->getVisible();
									$lboUnlockedCell     = $lobCell->getUnlockedCell();
									$lboMostrarCeros     = $lobCell->getMostrarCeros();

									if( $lnuRowspan > 0 )
									{
										$lobCell->setColumnNumber($lnuCells);
										$lstColumnExcel  = $lobCell->getColumnExcel();
										$lnuRowsTem      = $lnuRows;

										for ($xRP=0; $xRP < $lnuRowspan ; $xRP++)
										{ 

											$layRowspan[$lstColumnExcel.$lnuRowsTem ] = 1;
											$lnuRowsTem++;
										}
									}

									$lobCellStyle = $this->lobActiveSheet->getStyle($lstIdCell);

									if($lstClass != '' && $lstStyle == '')
										$this->lobStyleExcel->setStyleSelector('.'.$lstClass);

									if($lstStyle != '')
									{
										$this->lobStyleExcel->setStyleSelector('.styleCell'.$lstIdCell);
										$this->lobStyleExcel->setStyleDataCss('.styleCell'.$lstIdCell.'{'.$lstStyle.'}');
									}

									if($lstAlign != '')
										$this->lobStyleExcel->setStyleAlignment($lstAlign);

									if($lstfont != '')
										$this->lobStyleExcel->setStyleFont('.'.$lstfont);

									if($lstClass != '' || $lstStyle != '' || $lstAlign != '' || $lstfont != '' )
										$lobCellStyle->applyFromArray($this->lobStyleExcel->getStyleExcel());

									//-->NumberFormat

									if( $lstDataType != '' )
									{
										$this->lobStyleExcel->setNumberFormat($lstValue,$lstDataType);

										$lstValue        = $this->lobStyleExcel->getValueNumberFormat();
										$lstNumberFormat = $this->lobStyleExcel->getNumberFormat();
										$lobCellStyle->getNumberFormat()->setFormatCode( $lstNumberFormat );
									}

									//-->mergeCells
									$lstInitialCell  = $lstIdCell;
									$lobCell->mcreateIdExcel( $lnuRows,$lnuCells+( $lnuColspan-1) );
									$lstFinalCell    = $lobCell->getIdExcel();

									$lstInitialRow   = $lstIdCell;
									$lobCell->mcreateIdExcel($lnuRows+($lnuRowspan-1),$lnuCells );
									$lstFinalRow     = $lobCell->getIdExcel();

									if( $lboUnlockedCell == true )
										$this->lobActiveSheet->getStyle($lstIdCell)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
									
									if( $lnuWidth > 0 )
										$this->lobActiveSheet->getColumnDimension($lstColumnExcel)->setWidth($lnuWidth);
									else
										$this->lobActiveSheet->getColumnDimension($lstColumnExcel)->setAutoSize(true);

									if( $lboVisible == false )
										$this->lobActiveSheet->getColumnDimension($lstColumnExcel)->setVisible(false);

									if( $lnuColspan > 1 )
									{
										$this->lobActiveSheet->duplicateStyle( $this->lobActiveSheet->getStyle($lstIdCell), $lstInitialCell.':'.$lstFinalCell );
										$this->lobActiveSheet->mergeCells($lstInitialCell.':'.$lstFinalCell);
										$lnuCells += $lnuColspan;
									}
									else
										$lnuCells++;

									if( $lnuRowspan > 1 )
									{
										$this->lobActiveSheet->duplicateStyle( $this->lobActiveSheet->getStyle($lstIdCell), $lstInitialRow.':'.$lstFinalRow );
										$this->lobActiveSheet->mergeCells($lstInitialRow.':'.$lstFinalRow);
									}

									$this->lobActiveSheet->setCellValue($lstIdCell, $lstValue);
								}	
							}

							$lnuRows++;			
						}
					}
				}
			}
		}
	}
}

?>
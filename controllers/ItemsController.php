<?php

use \interfaces\ControllerInterfaces as Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;//phpoffice/phpspreadsheet
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;//phpoffice/phpspreadsheet
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment, fill};//стиль ячеек phpoffice/phpspreadsheet

class ItemsController implements Controller

{
    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception     *
     *phpoffice/phpspreadsheet - новый вариант
     *https://phpspreadsheet.readthedocs.io/en/latest/
     *https://hard-skills.ru/other/excel-phpspreadsheet/
     */
    public function index()
    {
        $items = ItemsModel::itemsList();
        // Создаем объект класса Spreadsheet()
        $spreadsheet = new Spreadsheet();
        //номер активного листа
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();
        //название листа
        $sheet->setTitle('Перечень товаров');
        //Внести значение в А1
        $sheet->setCellValue('A1', 'Перечень товаров');
        //Объеденить А1-С1
        $sheet->mergeCells('A1:C1');
        //форматирование
        $sheet->getStyle('A1:C1')->applyFromArray([
            //закрасить градиентом

            'fill' => [
                'fillType' => Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
//формат шрифта
            'font' => [
                'bold' => true,
            ],
            //выравнивание в ячейке
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
//толщина шрифта
            'borders' => [
                'top' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                ],
            ],
        ]);
//задаем ширину колонок
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        // вносим данные
        $sheet->setCellValue("A2", 'Наименование');
        $sheet->setCellValue("B2", 'Описание');
        $sheet->setCellValue("C2", 'Цена');

        foreach ($items as $index => $item) {
            //выведем данные
            $sheet->setCellValue('A' . ($index + 3), $item['name']);
            $sheet->setCellValue('B' . ($index + 3), $item['description']);
            $sheet->setCellValue('C' . ($index + 3), $item['price']);
            //выравняем столбец С по центру
            $sheet->getStyle('C' . ($index + 3))->getAlignment()->
            setHorizontal(Alignment::HORIZONTAL_CENTER);

        }
        // Выводим HTTP-заголовки
        header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); //тип файла ексел.xlsx
        header("Content-Disposition: attachment; filename=hello_world.xlsx");//Content-Disposition -контент скачивается

        $writer = new Xlsx($spreadsheet);//выберем формат файла Xlsx или Xls
        $writer->save('php://output');//сохранить и отправить на скачивание(переводим на хедер), если нужно в дериктории то указываем название файла с расширением

    }

    /**
     * Старый вариант
     * phpoffice/phpexcel Больше не поддерживается разработчиком
     */
    public function export()
    {
        $items = ItemsModel::itemsList();
        // Создаем объект класса PHPExcel
        $phpExcel = new PHPExcel();
// Устанавливаем индекс активного листа
        $phpExcel->setActiveSheetIndex(0);
        $sheet = $phpExcel->getActiveSheet();
// Подписываем лист
        $sheet->setTitle('Перечень товаров');
        // Вставляем текст в ячейку A1
        $sheet->setCellValue("A1", 'Перечень товаров');
        $sheet->getStyle('A1')->getFill()->setFillType(
            PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
// Объединяем ячейки
        $sheet->mergeCells('A1:C1');
        //задаем ширину колонок
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->setCellValue("A2", 'Наименование');
        $sheet->setCellValue("B2", 'Описание');
        $sheet->setCellValue("C2", 'Цена');
// Выравнивание текста
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(
            PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        foreach ($items as $index => $item) {
            //выведем данные
            $sheet->setCellValue('A' . ($index + 3), $item['name']);
            $sheet->setCellValue('B' . ($index + 3), $item['description']);
            $sheet->setCellValue('C' . ($index + 3), $item['price']);
            //выравняем столбец С по центру
            $sheet->getStyle('C' . ($index + 3))->getAlignment()->
            setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        }
        // Выводим HTTP-заголовки
        header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); //тип файла ексел.xlsx
        header("Content-Disposition: attachment; filename=some_excel_file.xlsx");//Content-Disposition -контент скачивается
        // Выводим содержимое файла
        $objWriter = new PHPExcel_Writer_Excel2007($phpExcel); // создаем класс сохранить как
        $objWriter->save('php://output');// предложет сохранить или открыть после сахранения, название файла в хедере

    }
}
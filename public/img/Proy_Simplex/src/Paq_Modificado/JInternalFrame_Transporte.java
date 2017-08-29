package Paq_Modificado;

import java.util.ArrayList;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

public class JInternalFrame_Transporte extends javax.swing.JInternalFrame {

    int Nro_Origen = 0, Nro_Destino = 0;
    int contador = 0, contadorAux = 0;
    ArrayList<Object> array = new ArrayList<Object>();

    public JInternalFrame_Transporte() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel3 = new javax.swing.JPanel();
        jPanel1 = new javax.swing.JPanel();
        txtNro_Origen = new javax.swing.JTextField();
        jLabel1 = new javax.swing.JLabel();
        btnAceptar = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();
        txtNro_Destino = new javax.swing.JTextField();
        jPanel2 = new javax.swing.JPanel();
        jLabel4 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        btnSolucion = new javax.swing.JButton();
        jScrollPane2 = new javax.swing.JScrollPane();
        jTableSolucion = new javax.swing.JTable();
        lbl_Iteraccion = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        JtxtResultado = new javax.swing.JTextField();

        setClosable(true);

        jPanel3.setBackground(new java.awt.Color(0, 0, 0));

        jPanel1.setBackground(new java.awt.Color(0, 51, 0));
        jPanel1.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 102, 102)));

        jLabel1.setForeground(new java.awt.Color(204, 255, 255));
        jLabel1.setText("Cantidad de Origen :");

        btnAceptar.setText("Aceptar");
        btnAceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnAceptarActionPerformed(evt);
            }
        });

        jLabel2.setForeground(new java.awt.Color(204, 255, 255));
        jLabel2.setText("Cantidad de Destino:");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jLabel1)
                    .addComponent(jLabel2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(txtNro_Destino)
                    .addComponent(txtNro_Origen, javax.swing.GroupLayout.DEFAULT_SIZE, 45, Short.MAX_VALUE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(btnAceptar)
                .addContainerGap(16, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addContainerGap()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel1)
                            .addComponent(txtNro_Origen, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(txtNro_Destino, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel2)))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(26, 26, 26)
                        .addComponent(btnAceptar)))
                .addContainerGap(41, Short.MAX_VALUE))
        );

        jPanel2.setBackground(new java.awt.Color(51, 0, 102));
        jPanel2.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 204)));

        jLabel4.setFont(new java.awt.Font("Verdana", 1, 18));
        jLabel4.setForeground(new java.awt.Color(0, 204, 204));
        jLabel4.setText("TRANSPORTE");

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 150, Short.MAX_VALUE)
            .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel2Layout.createSequentialGroup()
                    .addGap(0, 8, Short.MAX_VALUE)
                    .addComponent(jLabel4)
                    .addGap(0, 8, Short.MAX_VALUE)))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 103, Short.MAX_VALUE)
            .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel2Layout.createSequentialGroup()
                    .addGap(0, 40, Short.MAX_VALUE)
                    .addComponent(jLabel4)
                    .addGap(0, 40, Short.MAX_VALUE)))
        );

        jTable1.setBackground(new java.awt.Color(102, 204, 255));
        jTable1.setBorder(javax.swing.BorderFactory.createMatteBorder(1, 1, 1, 1, new java.awt.Color(0, 0, 153)));
        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "                 A", "                 B", "                 C", "                 D"
            }
        ));
        jTable1.setGridColor(new java.awt.Color(0, 0, 204));
        jScrollPane1.setViewportView(jTable1);

        btnSolucion.setFont(new java.awt.Font("Verdana", 1, 11));
        btnSolucion.setText("SOLUCION");
        btnSolucion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnSolucionActionPerformed(evt);
            }
        });

        jTableSolucion.setBackground(new java.awt.Color(102, 204, 255));
        jTableSolucion.setBorder(javax.swing.BorderFactory.createMatteBorder(1, 1, 1, 1, new java.awt.Color(0, 0, 153)));
        jTableSolucion.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "                  X", "                  Y", "                  Z", "                  W"
            }
        ));
        jTableSolucion.setGridColor(new java.awt.Color(0, 0, 153));
        jScrollPane2.setViewportView(jTableSolucion);

        lbl_Iteraccion.setFont(new java.awt.Font("Tahoma", 1, 12));
        lbl_Iteraccion.setForeground(new java.awt.Color(204, 255, 255));

        jLabel3.setForeground(new java.awt.Color(153, 255, 153));
        jLabel3.setText("El resultado es:");

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addGap(22, 22, 22)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jScrollPane2, javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jPanel3Layout.createSequentialGroup()
                        .addGap(27, 27, 27)
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel3Layout.createSequentialGroup()
                                .addGap(85, 85, 85)
                                .addComponent(btnSolucion)
                                .addGap(15, 15, 15)
                                .addComponent(jLabel3)
                                .addGap(12, 12, 12)
                                .addComponent(JtxtResultado, javax.swing.GroupLayout.PREFERRED_SIZE, 118, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(100, 100, 100)
                                .addComponent(lbl_Iteraccion))
                            .addGroup(jPanel3Layout.createSequentialGroup()
                                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                .addContainerGap(17, Short.MAX_VALUE))
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(23, 23, 23)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 117, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel3Layout.createSequentialGroup()
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(btnSolucion)
                            .addComponent(jLabel3)
                            .addComponent(JtxtResultado, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 188, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(37, 37, 37))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel3Layout.createSequentialGroup()
                        .addComponent(lbl_Iteraccion)
                        .addGap(259, 259, 259))))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, 513, javax.swing.GroupLayout.PREFERRED_SIZE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btnAceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnAceptarActionPerformed
        try {
                Nro_Origen = Integer.parseInt(txtNro_Origen.getText());
                Nro_Destino = Integer.parseInt(txtNro_Destino.getText());

                DefaultTableModel modelo = new DefaultTableModel();
                modelo.setRowCount(Nro_Origen + 1);
                modelo.setColumnCount(Nro_Destino + 2);//----
                //-------------------------
                int i = 0;
                if (contador > 0) {
                    array.clear();
                }
                array.add("");
                while (i < Nro_Destino) {
                    array.add("X" + (i + 1));
                    i++;
                }
                array.add("Total_Oferta");

                for (i = 0; i < Nro_Origen; i++) {
                    modelo.setValueAt("Y" + (i + 1), i, 0);
                }
                modelo.setValueAt("Total_Demanda", Nro_Origen, 0);
                modelo.setColumnIdentifiers(array.toArray());
                contador++;
                //-------------------------
                jTable1.setModel(modelo);   
        } catch (Exception e) {
            System.out.println(e.getMessage());
            System.out.println(e.getClass());
        }
}//GEN-LAST:event_btnAceptarActionPerformed

    private void btnSolucionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnSolucionActionPerformed
        try {
            int Matriz[][] = null, Matriz_Aux[][] = null;
            char Orientacion = ' ';
            int i = 0, j = 0, Sx = 0, Sy = 0, resta = 0;
            Matriz = new int[Nro_Origen + 1][Nro_Destino + 1];
            Matriz_Aux = new int[Nro_Origen + 1][Nro_Destino + 1];
            for (int v = 0; v < (Nro_Origen + 1); v++) {
                for (int h = 0; h < (Nro_Destino + 1); h++) {
                    Matriz[v][h] = Integer.parseInt(jTable1.getValueAt(v, h + 1).toString());//----------
                    Matriz_Aux[v][h] = 0;
                }
            }
            //----------------------
            int Suma_x = 0, Suma_y = 0, total = 0;
            if (contadorAux == 1) {
                array.remove(Nro_Destino + 1);
                contadorAux = 0;
            }
            for (int h = 0; h < Nro_Destino; h++) {
                Suma_x += Matriz[Nro_Origen][h];
            }
            for (int v = 0; v < Nro_Origen; v++) {
                Suma_y += Matriz[v][Nro_Destino];
            }
            //-------------------
            if (Matriz[Nro_Origen][0] == Matriz[0][Nro_Destino]) {
                Orientacion = 'm';
                Matriz_Aux[0][0] = Matriz[Nro_Origen][0];
                i++;
                j++;
            } else if (Matriz[Nro_Origen][0] < Matriz[0][Nro_Destino]) {
                Orientacion = 'd';
                Matriz_Aux[0][0] = Matriz[Nro_Origen][0];
                Sx = Matriz[Nro_Origen][0];
                j++;
            } else {
                Orientacion = 'a';
                Matriz_Aux[0][0] = Matriz[0][Nro_Destino];
                Sy = Matriz[0][Nro_Destino];
                i++;
            }

            //while (i != Nro_Origen || j != Nro_Destino) {
            while (i < Nro_Origen || j < Nro_Destino) {
                switch (Orientacion) {
                    case 'd':
                        resta = Matriz[i][Nro_Destino] - Sx;
                        if (resta == Matriz[Nro_Origen][j]) {
                            Orientacion = 'm';
                            Matriz_Aux[i][j] = resta;
                            Sx = 0;
                            Sy = 0;
                            i++;
                            j++;
                        } else if (resta < Matriz[Nro_Origen][j]) {
                            Orientacion = 'a';
                            Matriz_Aux[i][j] = resta;
                            Sy += resta;
                            Sx = 0;
                            i++;
                        } else {
                            Orientacion = 'd';
                            Matriz_Aux[i][j] = Matriz[Nro_Origen][j];
                            Sx += Matriz[Nro_Origen][j];
                            Sy = 0;
                            j++;
                        }
                        break;
                    case 'a':
                        resta = Matriz[Nro_Origen][j] - Sy;
                        if (resta == Matriz[i][Nro_Destino]) {
                            Orientacion = 'm';
                            Matriz_Aux[i][j] = resta;
                            Sx = 0;
                            Sy = 0;
                            i++;
                            j++;
                        } else if (resta < Matriz[i][Nro_Destino]) {
                            Orientacion = 'd';
                            Matriz_Aux[i][j] = resta;
                            Sx += resta;
                            Sy = 0;
                            j++;
                        } else {
                            Orientacion = 'a';
                            Matriz_Aux[i][j] = Matriz[i][Nro_Destino];
                            Sy += Matriz[i][Nro_Destino];
                            Sx = 0;
                            i++;
                        }

                        break;
                    case 'm':
                        if (Matriz[Nro_Origen][j] == Matriz[i][Nro_Destino]) {
                            Orientacion = 'm';
                            Matriz_Aux[i][j] = Matriz[i][Nro_Destino];
                            Sx = 0;
                            Sy = 0;
                            i++;
                            j++;
                        } else if (Matriz[Nro_Origen][j] < Matriz[i][Nro_Destino]) {
                            Orientacion = 'd';
                            Matriz_Aux[i][j] = Matriz[Nro_Origen][j];
                            Sx = Matriz[Nro_Origen][j];
                            Sy = 0;
                            j++;
                        } else {
                            Orientacion = 'a';
                            Matriz_Aux[i][j] = Matriz[i][Nro_Destino];
                            Sy = Matriz[i][Nro_Destino];
                            Sx = 0;
                            i++;
                        }
                        break;
                    default:
                        JOptionPane.showMessageDialog(this, "No es una opcion valida!!!");
                        break;
                }
            }
            //----------------------
            DefaultTableModel modeloSolucion = new DefaultTableModel();
            if (Suma_x == Suma_y) {
                modeloSolucion.setRowCount(Nro_Origen + 1);
                modeloSolucion.setColumnCount(Nro_Destino + 2);
                Matriz[Nro_Origen][Nro_Destino] = Suma_x;
                total = Suma_x;
                contadorAux = 0;
            } else if (Suma_x < Suma_y) {
                modeloSolucion.setRowCount(Nro_Origen + 1);
                modeloSolucion.setColumnCount(Nro_Destino + 3);
                array.add(Nro_Destino + 1, "Colum_Ficticia");
                Matriz[Nro_Origen][Nro_Destino] = Suma_y - Suma_x;
                total = Suma_y;
                contadorAux = 1;
            } else {
                modeloSolucion.setRowCount(Nro_Origen + 2);
                modeloSolucion.setColumnCount(Nro_Destino + 2);
                Matriz[Nro_Origen][Nro_Destino] = Suma_x - Suma_y;
                total = Suma_x;
                contadorAux = 2;
            }

            modeloSolucion.setColumnIdentifiers(array.toArray());

            //-----------------------
            for (int v = 0; v < (Nro_Origen + 1); v++) {
                modeloSolucion.setValueAt("Y" + (v + 1), v, 0);
                for (int h = 0; h < (Nro_Destino + 1); h++) {
                    modeloSolucion.setValueAt(Matriz_Aux[v][h], v, h + 1);//----
                }
            }
            modeloSolucion.setValueAt("Total_Demanda", Nro_Origen, 0);
            //--------------
            if (contadorAux == 2) {
                modeloSolucion.setValueAt("Fila_Ficticia", modeloSolucion.getRowCount() - 2, 0);
                modeloSolucion.setValueAt("Total_Demanda", modeloSolucion.getRowCount() - 1, 0);
            }
            if (contadorAux == 0) {
                modeloSolucion.setValueAt("Y" + (modeloSolucion.getRowCount() - 1), modeloSolucion.getRowCount() - 2, 0);
            }
            for (int k = 0; k < modeloSolucion.getColumnCount() - 2; k++) {
                modeloSolucion.setValueAt(Matriz[Nro_Origen][k], modeloSolucion.getRowCount() - 1, k + 1);
            }
            for (int h = 0; h < modeloSolucion.getRowCount() - 1; h++) {
                modeloSolucion.setValueAt(Matriz[h][Nro_Destino], h, modeloSolucion.getColumnCount() - 1);
            }
            JOptionPane.showMessageDialog(this, Suma_x + ", " + Suma_y);
            modeloSolucion.setValueAt(total, modeloSolucion.getRowCount()-1, modeloSolucion.getColumnCount()-1);
            //--------------
            jTableSolucion.setModel(modeloSolucion);
            // REALIZANDO LAS OPERACIONES DESPUES DE EQUILIBRAR
            int suma = 0;
            for (int k = 0; k < Nro_Origen; k++) {
                for (int l = 0; l < Nro_Destino; l++) {
                    suma += Matriz[k][l] * Matriz_Aux[k][l];
                }
            }
            JtxtResultado.setText(suma + "");
        } catch (Exception e) {
            System.out.println(e.getMessage());
            System.out.println(e.getClass());
        }
}//GEN-LAST:event_btnSolucionActionPerformed
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextField JtxtResultado;
    private javax.swing.JButton btnAceptar;
    private javax.swing.JButton btnSolucion;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JTable jTable1;
    private javax.swing.JTable jTableSolucion;
    private javax.swing.JLabel lbl_Iteraccion;
    private javax.swing.JTextField txtNro_Destino;
    private javax.swing.JTextField txtNro_Origen;
    // End of variables declaration//GEN-END:variables
}

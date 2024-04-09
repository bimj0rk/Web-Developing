package com.example.data.domain;

import jakarta.persistence.*;
import java.time.LocalDate;
import java.util.List;
import java.util.ArrayList;

@Entity
public class MedicalEncounter {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private LocalDate date;

    @ManyToOne
    @JoinColumn(name = "patient_id")
    private Patient patient;

    @ManyToOne
    @JoinColumn(name = "careProvider_id")
    private CareProvider careProvider;

    @OneToMany(mappedBy = "medicalEncounter", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<HealthService> healthServices;

    // Constructors
    public MedicalEncounter() {}

    public MedicalEncounter(LocalDate date, Patient patient, CareProvider careProvider) {
        this.date = date;
        this.patient = patient;
        this.careProvider = careProvider;
    }

    // Getters and setters
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public LocalDate getDate() {
        return date;
    }

    public void setDate(LocalDate date) {
        this.date = date;
    }

    public Patient getPatient() {
        return patient;
    }

    public void setPatient(Patient patient) {
        this.patient = patient;
    }

    public CareProvider getCareProvider() {
        return careProvider;
    }

    public void setCareProvider(CareProvider careProvider) {
        this.careProvider = careProvider;
    }

    public List<HealthService> getHealthServices() {
        return healthServices;
    }

    public void setHealthServices(List<HealthService> healthServices) {
        this.healthServices = healthServices;
    }

    public void addHealthService(HealthService healthService) {
        if (this.healthServices == null) {
            this.healthServices = new ArrayList<>();
        }
        this.healthServices.add(healthService);
        healthService.setMedicalEncounter(this);
    }
}

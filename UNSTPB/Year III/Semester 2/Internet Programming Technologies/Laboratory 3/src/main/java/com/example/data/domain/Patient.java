package com.example.data.domain;

import jakarta.persistence.*;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.util.HashSet;
import java.util.Set;

@Entity
@Data
@NoArgsConstructor
public class Patient {
    @Id
    @GeneratedValue

    private Long id;
    private String name;

    @OneToMany(mappedBy = "patient", cascade = CascadeType.PERSIST, fetch = FetchType.EAGER)
    private Set<MedicalEncounter> medicalEncounters = new HashSet<>();

    @OneToMany(mappedBy = "patient", cascade = CascadeType.PERSIST, fetch = FetchType.EAGER)
    private Set<HealthIssue> healtIssues = new HashSet<>();

    public Patient(String name) {
        this.name = name;
    }
}